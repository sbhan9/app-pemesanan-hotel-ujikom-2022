<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasModel extends Model
{
   protected $table      = 'tb_fasilitas_umum';
   protected $primaryKey = 'id_fasilitas';
   protected $useTimestamps = true;
   protected $createdField  = 'created_at';
   protected $updatedField  = '';
   protected $allowedFields = ['fasilitas', 'keterangan'];

}