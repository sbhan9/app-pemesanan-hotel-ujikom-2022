<?php

namespace App\Controllers;

use App\Models\OrderModel;
use Config\Database;

class Resepsionis extends BaseController
{
   protected $db;
   public function __construct()
   {
      $this->db = \Config\Database::connect();   
   }

   public function index()
   {
      // total tamu
      $totalTamu = $this->db->table('tb_order')->selectCount('id_order')->get()->getResult()[0];
      // chechkin & checkout hari ini 
      $totalCheckIn = $this->db->table('tb_order')->selectCount('id_order')->getWhere(['check_in' => date('Y-m-d')])->getResult()[0];
      $totalCheckOut = $this->db->table('tb_order')->selectCount('id_order')->getWhere(['check_out' => date('Y-m-d')])->getResult()[0];
      $checkInHariIni = $this->db->table('tb_order')->getWhere(['check_in' => date('Y-m-d')])->getResult();
      $checkOutHariIni = $this->db->table('tb_order')->getWhere(['check_out' => date('Y-m-d')])->getResult();
      $dataOrder = new OrderModel();
      return view('resepsionis/index', [
         'title' => 'Halaman Resepsionis',
         'active' => 'resepsionis',
         'orderan' => $dataOrder->findAll(),
         'totalTamu' => $totalTamu,
         'totalCheckIn' => $totalCheckIn,
         'totalCheckOut' => $totalCheckOut,
         'checkInHariIni' => $checkInHariIni,
         'checkOutHariIni' => $checkOutHariIni
      ]);
   }

   public function detail($username)
   {
      $dataUser = $this->db->table('tb_order')->getWhere(['username' => $username])->getResultArray();

      if ($dataUser == []) {
         return redirect()->to('/page-resepsionis');
      }

      return view('resepsionis/detail', [
         'title' => 'Detail Tamu',
         'active' => 'tamu',
         'dataUser' => $dataUser[0],
      ]);
   }

   public function tampilFilteringDate()
   {
      $dataOrder = $this->db->query("SELECT * FROM tb_order WHERE (check_in LIKE '%".date_format(date_create($this->request->getVar('filteringDate')), 'm-d')."%' || check_out LIKE '%".date_format(date_create($this->request->getVar('filteringDate')), 'm-d')."%')")->getResultArray();
      return view('resepsionis/filter-data', [
         'dataOrder' => $dataOrder
      ]);
   }

   public function serchingData() {
      $dataOrder = $this->db->query("SELECT * FROM tb_order WHERE (nama LIKE '%".$this->request->getVar('keyword')."%')")->getResultArray();
      return view('resepsionis/filter-data', [
         'dataOrder' => $dataOrder
      ]);
   }
}