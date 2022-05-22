<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarModel extends Model
{
   protected $table      = 'tb_users';
   protected $primaryKey = 'id_user';
   protected $useTimestamps = true;
   protected $createdField  = 'created_at';
   protected $updatedField  = '';
   protected $allowedFields = ['nama_lengkap', 'no_telp', 'email', 'username', 'password'];

}