<?php

namespace App\Controllers;

use App\Models\DaftarModel;
use Config\Services;

class Home extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $kamar = $this->db->table('tb_kamar')->select('*')->get()->getResultArray();
        return view('home/index', [
            'title' => 'Sumkul Official',
            'active' => 'index',
            'kamar' => $kamar
        ]);
    }

    public function kamar()
    {
        $kamar = $this->db->table('tb_kamar')->select('*')->get()->getResultArray();
        $fasilitasUmum = $this->db->table('tb_fasilitas_umum')->select('*')->get()->getResultArray();
        return view('home/kamar', [
            'title' => 'Kamar',
            'active' => 'kamar',
            'kamar' => $kamar,
            'fasilitasUmum' => $fasilitasUmum,
        ]);
    }

    public function masuk() {
        return view('home/masuk', [
            'title' => 'Halaman Masuk',
            'active' => 'masuk'
        ]);
    }

    public function daftar() {
        return view('home/daftar', [
            'title' => 'Halaman Daftar',
            'active' => 'daftar',
            'validasi' => Services::validation()
        ]);
    }

    public function prosesDaftar()
    {
        // validasi
        $validasi = [
            'nama_lengkap' => [
                'rules' => 'required|alpha_space|min_length[6]|',
                'errors' => [
                    'required' => 'nama lengkap tidak boleh kosong',
                    'alpha_space'  => 'nama lengkap hanya berisi huruf',
                    'min_length'  => 'minimal 6 huruf',
                ]
            ],
            'no_telp' => [
                'rules' => 'required|numeric|min_length[11]|max_length[13]|is_unique[tb_users.no_telp]',
                'errors' => [
                    'required' => 'nomor telephone tidak boleh kosong',
                    'numeric'  => 'nomer telepon hanya berisi angka',
                    'min_length'  => 'nomor anda kurang dari 12',
                    'max_length'  => 'nomor anda lebih dari 12',
                    'is_unique' => 'no telephone sudah terdaftar'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_emails|is_unique[tb_users.email]',
                'errors' => [
                    'required' => 'email tidak boleh kosong',
                    'valid_emails'  => 'email tidak valid',
                    'is_unique' => 'email sudah terdaftar'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[tb_users.username]|min_length[6]',
                'errors' => [
                    'required' => 'username tidak boleh kosong',
                    'is_unique'  => 'username sudah terdaftar',
                    'min_length'  => 'minimal 6 karakter'
                ]
            ],
            'pw1' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'password tidak boleh kosong',
                    'min_length' => 'minimal 8 karakter',
                ]
            ],
            'pw2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'konfirmasi password tidak boleh kosong',
                ]
            ],
        ];

        if( !$this->validate($validasi) ) {
            return redirect()->to(base_url('/daftar'))->withInput();
        }
        
        // cek passoword
        if( $this->request->getVar('pw1') != $this->request->getVar('pw2') ) {
            session()->setFlashdata('pwTidakSama', 'Password tidak sesuai');
            return redirect()->to(base_url('/daftar'))->withInput();
        }
        
        // proses input ke database
        $daftarModel = new DaftarModel();
        $daftarModel->save([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'no_telp' => $this->request->getVar('no_telp'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('pw2'), PASSWORD_BCRYPT),
        ]);
        
        session()->setFlashdata('daftarBerhasil', 'selamat registrasi berhasil');
        return redirect()->to(base_url('/daftar'));
    }

    public function prosesMasuk()
    {
        // ambil password berdasarkan username
        $dataUser = $this->db->table('tb_users')->select('*')->getWhere(['username' => $this->request->getVar('username')]);
        if( !empty($dataUser->getResultArray()[0]) ) {
            if( password_verify($this->request->getVar('password') , $dataUser->getResultArray()[0]['password']) ) {
                // data di simpan di sesi
                session()->set($dataUser->getResultArray()[0]);
                session()->set('login', true);

                // cek level 
                if( session()->id_level == 1 || session()->id_level == 4) {
                    // admin
                    return redirect()->to(base_url('/administrator'));
                } else if ( session()->id_level == 2 ) {
                    // resepsionis
                    return redirect()->to(base_url('/page-resepsionis'));
                } else if ( session()->id_level == 3 ) {
                    // tamu
                    return redirect()->to(base_url('/page-tamu'));
                }
            } else {
                session()->setFlashdata('pwSalahSatu', 'username dan password anda salah');
                return redirect()->to(base_url('/masuk'));
            }
        } else {
            session()->setFlashdata('pwSalah', 'username dan password anda salah');
            return redirect()->to(base_url('/masuk'));
        }
    }

    public function keluar() {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}