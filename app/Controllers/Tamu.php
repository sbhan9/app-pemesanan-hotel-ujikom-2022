<?php

namespace App\Controllers;

use App\Models\OrderModel;
use Config\Services;
use Dompdf\Dompdf;

class Tamu extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $kamar = $this->db->table('tb_kamar')->select('*')->get()->getResultArray();
        return view('tamu/index', [
            'title' => 'Sumkul Official',
            'active' => 'index',
            'kamar' => $kamar
        ]);
    }

    public function kamar()
    {
        $kamar = $this->db->table('tb_kamar')->select('*')->get()->getResultArray();
        $fasilitasUmum = $this->db->table('tb_fasilitas_umum')->select('*')->get()->getResultArray();
        return view('tamu/kamar', [
            'title' => 'Kamar',
            'active' => 'kamar',
            'kamar' => $kamar,
            'fasilitasUmum' => $fasilitasUmum,
        ]);
    }

    public function booking($kode_kamar)
    {
        // cari data user berdasarkan id user
        $dataUser = $this->db->table('tb_users')->select('*')->getWhere(['id_user' => session()->id_user])->getResultArray()[0];
        // cari data sesuai id kamar
        $dataKamar = $this->db->table('tb_kamar')->select('*')->getWhere(['kode_kamar' => $kode_kamar])->getResultArray();
        if ($dataKamar == []) {
            return redirect()->to('/page-tamu/kamar');
        }
        // cari total kamar berdasarkan tipe kamar
        $totalKamar = $this->db->table('tb_kamar')->select('stok_kamar')->getWhere(['kode_kamar' => $kode_kamar])->getResult()[0];
        // dd($kamarDiOrder);
        if( !empty($this->db->table('tb_order')->select('jumlah_order')->getWhere(['tipe_kamar' => $dataKamar[0]['tipe_kamar']])->getResultArray()) ) {
            $kamarDiOrder = $this->db->table('tb_order')->selectSum('jumlah_order')->getWhere(['tipe_kamar' => $dataKamar[0]['tipe_kamar']])->getResultArray();
            $stokKamar = explode(" ", $kamarDiOrder[0]['jumlah_order']);
            $stokKamar = $dataKamar[0]['stok_kamar'] - $stokKamar[0];
        } else {
            $stokKamar = $dataKamar[0]['stok_kamar'];
        }
        // cek ketersediaan kamar
        if (empty($dataKamar)) {
            return redirect()->to(base_url('/page-tamu/kamar'));
        }
        return view('tamu/booking-hotel', [
            'title' => 'Booking Hotel',
            'active' => 'booking',
            'dataKamar' => $dataKamar[0],
            'dataUser' => $dataUser,
            'totalKamar' => $totalKamar,
            'kodeKamar' => $kode_kamar,
            'validasi' => Services::validation(),
            'stokKamar' => $stokKamar
        ]);
    }

    public function orderNow()
    {
        // generate kode booking
        $kode = 'skul' . rand(time(), date('Y'));
        
        // validasi
        $validasi = [
            'checkin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tidak boleh kosong'
                ]
            ],
            'checkout' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tidak boleh kosong'
                ]
            ],
            'tipekamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tidak boleh kosong'
                ]
            ],
            'hargaperkamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tidak boleh kosong'
                ]
            ],
            'jmlhkamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tidak boleh kosong'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[tb_order.username]',
                'errors' => [
                    'required' => 'tidak boleh kosong',
                    'is_unique' => 'opps.. anda sudah membooking kamar di Sumkul Hotel'
                ]
            ],
            'namalengkap' => [
                'rules' => 'required|alpha_space|min_length[6]',
                'errors' => [
                    'required' => 'tidak boleh kosong',
                    'alpha_space' => 'nama lengkap hanya berisi huruf',
                    'min_length' => 'nama tidak jelas'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tidak boleh kosong'
                ]
            ],
            'notelephone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tidak boleh kosong'
                ]
            ],
            'alamat' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'tidak boleh kosong',
                    'min_length' => 'alamat kurang lengkap'
                ]
            ],
            'lamainap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tidak boleh kosong'
                ]
            ],
            'totalbiaya' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tidak boleh kosong'
                ]
            ],
        ];
        
        if(!$this->validate($validasi)) {
            return redirect()->to(base_url('/page-tamu/booking-now/' . $this->request->getVar('kodeKamar')))->withInput();
        }
        
        $booking = new OrderModel();
        $booking->save([
            'check_in' => $this->request->getVar('checkin'),
            'check_out' => $this->request->getVar('checkout'),
            'tipe_kamar' => $this->request->getVar('tipekamar'),
            'harga' => $this->request->getVar('hargaperkamar'),
            'jumlah_order' => $this->request->getVar('jmlhkamar') . ' kamar',
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('namalengkap'),
            'email' => $this->request->getVar('email'),
            'no_telephone' => $this->request->getVar('notelephone'),
            'alamat' => $this->request->getVar('alamat'),
            'lama_hari' => $this->request->getVar('lamainap'),
            'total_bayar' => $this->request->getVar('totalbiaya'),
            'kode_booking' => $kode,
            'status' => 'diproses',
        ]);

        session()->setFlashdata('orderBerhasil', 'selemat order berhasil');
        return redirect()->to(base_url('/page-tamu/booking-now/' . $this->request->getVar('kodeKamar')))->withInput();
    }

    public function bookingan()
    {
        $dataOrder = new OrderModel();
        if (empty($dataOrder->where('username', session()->username)->findAll()[0])) {
            echo view('tamu/tidak-ada-bookingan', [
                'title' => 'Data Reservasi',
                'active' => 'reservasi',
            ]);
            exit;
        } 
        return view('tamu/reservasi', [
            'title' => 'Data Reservasi',
            'active' => 'reservasi',
            'dataUser' => $dataOrder->where('username', session()->username)->findAll()[0],
        ]);
    }

    public function pembayaran()
    {
        // get file
        $buktiPembayaran = $this->request->getFile('buktipembayaran');
        $namaRand = $buktiPembayaran->getRandomName();
        $buktiPembayaran->move('bukti_pembayaran', $namaRand);
        $this->db->table('tb_order')->set([
            'bukti_pembayaran' => $namaRand,
            'nama_bank' => $this->request->getVar('pilihBank'),
        ])->where('username', session()->username)->update();

        session()->setFlashdata('berhasilDiBayar', 'pembayaran berhasil');
        return redirect()->to(base_url('/page-tamu/profile/bookingan'));
    }

    public function cetakStruk()
    {
        $dataOrder = new OrderModel();
        $dompdf = new Dompdf(['isRemoteEnabled' => true]);
        $html = view('tamu/cetakstruk', [
            'title' => 'Data Reservasi',    
            'active' => 'reservasi',
            'dataUser' => $dataOrder->where('username', session()->username)->findAll()[0],
        ]);
        // instantiate and use the dompdf class
        $dompdf->loadHtml($html);
        $dompdf->setPaper('F4', 'landscape');
        $dompdf->render();
        $dompdf->stream('bukti-transaksi-sumkulhotel-'. session()->username .'.pdf', [
            'Attachment' => false
        ]);
    }

    public function profile()
    {
        $profile = $this->db->table('tb_users')->select('*')->getWhere(['id_user' => session()->id_user])->getResult()[0];
        return view('tamu/profile', [
            'title' => 'Profile',
            'active' => 'profile',
            'profile' => $profile,
            'validasi' => Services::validation()
        ]);
    }

    public function perbaruiProfile()
    {
        // cek username
        $cekUsername = $this->db->table('tb_users')->select('username')->getWhere(['id_user' => session()->id_user])->getResult()[0];
        if ( $cekUsername->username == $this->request->getVar('username') ) {
            $rulesUsername = 'required|min_length[6]';
        } else {
            $rulesUsername = 'is_unique[tb_users.username]|required|min_length[6]';
        }

        // cek email
        $cekEmail = $this->db->table('tb_users')->select('email')->getWhere(['id_user' => session()->id_user])->getResult()[0];
        if ( $cekEmail->email == $this->request->getVar('email') ) {
            $rulesEmail = 'required|valid_emails';
        } else {
            $rulesEmail = 'required|valid_emails|is_unique[tb_users.email]';
        }

        // cek nomer telepon
        $cekNo = $this->db->table('tb_users')->select('no_telp')->getWhere(['id_user' => session()->id_user])->getResult()[0];
        if ( $cekNo->no_telp == $this->request->getVar('notelp') ) {
            $rulesNo = 'required|numeric|min_length[11]|max_length[13]';
        } else {
            $rulesNo = 'required|numeric|min_length[11]|max_length[13]|is_unique[tb_users.no_telp]';
        }
        
        // validasi
        $validasi = [
            'fotoprofile' => [
                'rules' => 'max_size[fotoprofile,1048]|is_image[fotoprofile]|mime_in[fotoprofile,image/png,image/jpg]',
                'errors' => [
                    'max_size' => 'ukuran foto terlalu besar',
                    'is_image' => 'file yang anda pilih bukan file gambar',
                    'mime_in' => 'foto profile hanya boleh png/jpg'
                ]
            ],
            'namalengkap' => [
                'rules' => 'required|alpha_space|min_length[6]|',
                'errors' => [
                    'required' => 'nama lengkap tidak boleh kosong',
                    'alpha_space'  => 'nama lengkap hanya berisi huruf',
                    'min_length'  => 'minimal 6 huruf',
                ]
            ],
            'notelp' => [
                'rules' => $rulesNo,
                'errors' => [
                    'required' => 'nomor telephone tidak boleh kosong',
                    'numeric'  => 'nomer telepon hanya berisi angka',
                    'min_length'  => 'nomor anda kurang dari 12',
                    'max_length'  => 'nomor anda lebih dari 12',
                    'is_unique' => 'no telephone sudah terdaftar'
                ]
            ],
            'email' => [
                'rules' => $rulesEmail,
                'errors' => [
                    'required' => 'email tidak boleh kosong',
                    'valid_emails'  => 'email tidak valid',
                    'is_unique' => 'email sudah terdaftar'
                ]
            ],
            'alamat' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'tidak boleh kosong',
                    'min_length' => 'alamat kurang lengkap'
                ]
            ],
            'username' => [
                'rules' => $rulesUsername,
                'errors' => [
                    'required' => 'username tidak boleh kosong',
                    'is_unique'  => 'username sudah terdaftar',
                    'min_length'  => 'minimal 6 karakter'
                ]
            ],
        ];
        
        if(!$this->validate($validasi)) {
            return redirect()->to(base_url('/page-tamu/profile'))->withInput();
        }
        
        $getFoto = $this->request->getFile('fotoprofile');
        if($getFoto->getError() == 4) {
            $getNama = $this->request->getVar('fotolama');
        } else {
            $getNama = $getFoto->getRandomName();
            $getFoto->move('foto_profile/', $getNama);
        }
        
        $this->db->table('tb_users')->set([
            'foto_profile' => $getNama,
            'nama_lengkap' => $this->request->getVar('namalengkap'),
            'no_telp' => $this->request->getVar('notelp'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
            'username' => $this->request->getVar('username'),
        ])->where('id_user', session()->id_user)->update();
        
        session()->setFlashdata('updateBerhasil', 'update berhasil');
        return redirect()->to('/page-tamu/profile');
    }

    public function ubahSandi()
    {
        return view('tamu/ubah-sandi', [
            'title' => 'Ubah Kata Sandi',
            'active' => 'sandi',
            'validasi' => Services::validation()
        ]);
    }

    public function updateSandi()
    {
        $getSandi = $this->db->table('tb_users')->select('password')->getWhere(['id_user' => session()->id_user])->getResult()[0];
        if ( password_verify($this->request->getVar('sandilama'), $getSandi->password )) {
            $validasi = [
                'sandilama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'kata sandi lama tidak boleh kosong',
                    ]
                ],
                'sandibaru' => [
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'required' => 'kata sandi baru tidak boleh kosong',
                        'min_length' => 'kata sandi minimal 8 karakter'
                    ]
                ],
                'konfsandibaru' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'konfirmasi kata sandi baru tidak boleh kosong',
                    ]
                ]
            ];

            if(!$this->validate($validasi)) {
                return redirect()->to('/page-tamu/profile/ubah-sandi')->withInput();
            }

            $pwBaru = $this->request->getVar('sandibaru');
            $konfPwBaru = $this->request->getVar('konfsandibaru');
            if ( $pwBaru !== $konfPwBaru ) {
                session()->setFlashdata('pwTidakSama', 'konfirmasi kata sandi tidak sesuai');
                return redirect()->to(base_url('/page-tamu/profile/ubah-sandi'))->withInput();
            }

            $this->db->table('tb_users')->set([
                'password' => password_hash($konfPwBaru, PASSWORD_BCRYPT)
            ])->where('id_user', session()->id_user)->update();

            session()->setFlashdata('berhasilUpdateSandi', 'kata sandi berhasil diubah');
            return redirect()->to('/page-tamu/profile/ubah-sandi');
        } else {
            session()->setFlashdata('sandiTidakSesuai', 'kata sandi lama tidak sesuai');
            return redirect()->to(base_url('/page-tamu/profile/ubah-sandi'))->withInput();
        }
    }
}