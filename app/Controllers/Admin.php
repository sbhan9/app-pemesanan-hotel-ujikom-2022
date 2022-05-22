<?php

namespace App\Controllers;

use App\Models\DaftarModel;
use App\Models\FasilitasModel;
use App\Models\KamarModel;
use Config\Database;
use Config\Services;
use Faker\Provider\Base;
use PhpParser\Node\Expr\FuncCall;

class Admin extends BaseController
{
   protected $db;
   public function __construct()
   {
      $this->db = Database::connect();
   }

   public function index()
   {
      $tamu = $this->db->table('tb_users')->select('*')->getWhere(['id_level' => 3])->getResultArray();
      $totalTamu = $this->db->table('tb_users')->selectCount('id_user')->getWhere(['id_level' => 3])->getResult()[0];
      $totalResepsionis = $this->db->table('tb_users')->selectCount('id_user')->getWhere(['id_level' => 2])->getResult()[0];
      $totalAdmin = $this->db->table('tb_users')->selectCount('id_user')->getWhere(['id_level' => 1])->getResult()[0];
      $totalSemiAdmin = $this->db->table('tb_users')->selectCount('id_user')->getWhere(['id_level' => 4])->getResult()[0];
      $stokKamar = $this->db->table('tb_order')->selectCount('id_order')->get()->getResult()[0];
      return view('admin/index', [
         'title' => 'Admnistrator',
         'tamu' => $tamu,
         'totalTamu' => $totalTamu,
         'stokKamar' => $stokKamar,
         'active' => 'index',
         'totalResepsionis' => $totalResepsionis,
         'totalAdmin' => $totalAdmin->id_user + $totalSemiAdmin->id_user
      ]);
   }

   public function admin()
   {
      $totalAdmin = $this->db->query("SELECT * FROM tb_users WHERE id_level = 1 || id_level = 4")->getResultArray();
      return view('admin/admin', [
         'title' => 'Data Admin',
         'admin' => $totalAdmin,
         'active' => 'admin'
      ]);
   }

   public function resepsionis()
   {
      $resepsionis = $this->db->table('tb_users')->select('*')->getWhere(['id_level' => 2])->getResultArray();
      return view('admin/resepsionis', [
         'title' => 'Data Resepsionis',
         'resepsionis' => $resepsionis,
         'active' => 'resepsionis'
      ]);
   }

   public function kamar() 
   {
      $kamar = new KamarModel();
      return view('admin/kelola-kamar', [
         'title' => 'Kamar dan Fasilitas',
         'active' => 'kamar',
         'kamar' => $kamar->findAll()
      ]);
   }

   public function fasilitasUmum()
   {
      $fasilitasUmum = new FasilitasModel();
      return view('admin/fasilitas-umum', [
         'title' => 'Fasilitas Umum',
         'active' => 'fasilitas',
         'fasilitasUmum' => $fasilitasUmum->findAll(),
      ]);
   }

   public function profile()
   {
      return view('admin/profile', [
         'title' => 'Foto Profile',
         'active' => 'profile',
      ]);
   }

   public function editDataFasilitasUmum($id_fasilitas)
   {
      $fasilitasUmum = $this->db->table('tb_fasilitas_umum')->select('*')->getWhere(['id_fasilitas' => $id_fasilitas])->getResult()[0];
      return view('admin/edit-fasilitas-umum', [
         'title' => 'Edit Fasilitas Umum',
         'active' => 'fasilitas-umum',
         'data' => $fasilitasUmum,
         'dataid' => $id_fasilitas,
      ]);
   }

   public function prosesUpdateDataFasilitasUmum()
   {
      $validasi = [
         'namafasilitas' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'tidak boleh di kosong'
            ]
         ],
         'ketFasilitas' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'tidak boleh di kosong'
            ]
         ]
      ];

      if(!$this->validate($validasi)) {
         session()->setFlashdata('editError', 'Opps... Mohon maaf data gagal di perbarui');
         return redirect()->to('/administrator/edit-fasilitas-umum/' . $this->request->getVar('idfasilitas'));
      }

      $fotoKamar = $this->request->getFile('fotoFasilitas');
      if($fotoKamar->getError() == 4) {
         $namaGambar = $this->request->getVar('gambarLama');
      } else {
         $namaGambar = $fotoKamar->getRandomName();
         $fotoKamar->move('assets/img/', $namaGambar);
      }
      
      $this->db->table('tb_fasilitas_umum')->set([
         'fasilitas' => $this->request->getVar('namafasilitas'),
         'keterangan' => $this->request->getVar('ketFasilitas'),
         'foto_fasilitas' => $namaGambar
      ])->where('id_fasilitas', $this->request->getVar('idfasilitas'))->update();

      session()->setFlashdata('updateberhasil', 'Update Data Fasilitas Umum berhasil');
      return redirect()->to(base_url('/administrator/fasilitas-umum'));
   }

   public function deleteFasilitas($id)
   {
      $this->db->table('tb_fasilitas_umum')->where('id_fasilitas', $id)->delete();
      return redirect()->to('administrator/fasilitas-umum');
   }

   public function tambahFasilitas()
   {
      $validasi = [
         'nfasilitas' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'wajib di isi'
            ]
         ],
         'nket' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'wajib di isi'
            ]
         ],
         'nfoto' => [
            'rules' => 'uploaded[nfoto]',
            'errors' => [
               'uploaded' => 'wajib di isi'
            ]
         ],
      ];

      if(!$this->validate($validasi)) {
         session()->setFlashdata('error', 'Data Fasilatas gagal ditambahkan');
         return redirect()->to(base_url('/administrator/fasilitas-umum'));
      }

      $getfoto = $this->request->getFile('nfoto');
      $getNama = $getfoto->getRandomName();
      $getfoto->move('assets/img/', $getNama);

      $this->db->table('tb_fasilitas_umum')->insert([
         'fasilitas' => $this->request->getVar('nfasilitas'),
         'keterangan' => $this->request->getVar('nket'),
         'foto_fasilitas' => $getNama
      ]);
      
      session()->setFlashdata('tambahBerhasil', 'Data Fasilatas berhasil ditambahkan');
      return redirect()->to(base_url('/administrator/fasilitas-umum'));
   }

   public function editDataKamar($idKamar)
   {
      $dataKamar = $this->db->table('tb_kamar')->select('*')->getWhere(['id_kamar' => $idKamar])->getResult()[0];
      return view('admin/edit-data-kamar', [
         'title' => 'Edit Fasilitas Umum',
         'active' => 'fasilitas-umum',
         'data' => $dataKamar,
         'dataid' => $idKamar,
      ]);
   }

   public function updateDataKamar()
   {
      $validasi = [
         'tipekamar' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'tidak boleh di kosong'
            ]
         ],
         'fasilitaskamar' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'tidak boleh di kosong'
            ]
         ],
         'jumlahkamar' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'tidak boleh di kosong'
            ]
         ],
         'hargapermalam' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'tidak boleh di kosong'
            ]
         ],
         'kodekamar' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'tidak boleh di kosong'
            ]
         ],
      ];

      if(!$this->validate($validasi)) {
         session()->setFlashdata('editError', 'Opps... Mohon maaf data gagal di perbarui');
         return redirect()->to('/administrator/edit-data-kamar/' . $this->request->getVar('idfasilitas'));
      }

      $fotoKamar = $this->request->getFile('fotoKamar');
      if( $fotoKamar->getError() == 4 ) {
         $namaFoto = $this->request->getVar('fotoKamar');
      } else {
         $namaFoto = $fotoKamar->getRandomName();
         $fotoKamar->move('img/', $namaFoto);
      }
      
      $this->db->table('tb_kamar')->set([
         'tipe_kamar' => $this->request->getVar('tipekamar'),
         'fasilitas' => $this->request->getVar('fasilitaskamar'),
         'stok_kamar' => $this->request->getVar('jumlahkamar'),
         'harga' => $this->request->getVar('hargapermalam'),
         'foto_kamar' => $namaFoto,
         'kode_kamar' => $this->request->getVar('kodekamar'),
      ])->where('id_kamar', $this->request->getVar('idfasilitas'))->update();

      session()->setFlashdata('updateberhasil', 'Update Data Fasilitas Umum berhasil');
      return redirect()->to(base_url('/administrator/kamar'));
   }

   public function deleteKamar($id)
   {
      $this->db->table('tb_kamar')->where('id_kamar', $id)->delete();
      return redirect()->to('administrator/kamar');
   }

   public function tambahDataKamar()
   {
      $validasi = [
         'tipekamar' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'wajib di isi'
            ]
         ],
         'nket' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'wajib di isi'
            ]
         ],
         'jmlhkamar' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'wajib di isi'
            ]
         ],
         'nfoto' => [
            'rules' => 'uploaded[nfoto]',
            'errors' => [
               'uploaded' => 'wajib di isi'
            ]
         ],
         'kodekamar' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'wajib di isi'
            ]
         ],
      ];

      if(!$this->validate($validasi)) {
         session()->setFlashdata('error', 'Data Fasilatas gagal ditambahkan');
         return redirect()->to(base_url('/administrator/kamar'));
      }

      $getfoto = $this->request->getFile('nfoto');
      $getNama = $getfoto->getRandomName();
      $getfoto->move('assets/img/', $getNama);

      $this->db->table('tb_kamar')->insert([
         'tipe_kamar' => $this->request->getVar('tipekamar'),
         'fasilitas' => $this->request->getVar('nket'),
         'stok_kamar' => $this->request->getVar('jmlhkamar'),
         'harga' => $this->request->getVar('hargakamar'),
         'foto_kamar' => $getNama,
         'kode_kamar' => $this->request->getVar('kodekamar'),
      ]);
      
      session()->setFlashdata('tambahBerhasil', 'Data Fasilatas berhasil ditambahkan');
      return redirect()->to(base_url('/administrator/kamar'));
   }

   public function detail($username)
   {
      $dataUser = $this->db->table('tb_users')->select('*')->getWhere(['username' => $username])->getResultArray();

      if ($dataUser == []) {
         return redirect()->to('/administrator');
      }

      return view('admin/detail', [
         'title' => 'Detail | '.$dataUser[0]['nama_lengkap'],
         'active' => 'fasilitas-umum',
         'dataUser' => $dataUser[0]
      ]);
   }

   public function deleteAdmin($username)
   {
      $this->db->table('tb_users')->delete(['username' => $username]);
      session()->setFlashdata('hapusBerhasil', 'berhasil di hapus');
      return redirect()->to('/administrator/data-admin');
   }

   public function deleteResepsionis($username)
   {
      $this->db->table('tb_users')->delete(['username' => $username]);
      session()->setFlashdata('hapusBerhasil', 'berhasil di hapus');
      return redirect()->to('/administrator/data-resepsionis');
   }
}