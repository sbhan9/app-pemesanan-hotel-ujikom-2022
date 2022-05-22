<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
   protected $table      = 'tb_kamar';
   protected $primaryKey = 'id_kamar';
   protected $useTimestamps = true;
   protected $createdField  = 'created_at';
   protected $updatedField  = '';
   protected $allowedFields = ['tipe_kamar', 'fasilitas', 'keterangan', 'stok_kamar'];

}