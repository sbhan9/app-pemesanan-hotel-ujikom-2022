<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
   protected $table = 'tb_order';
   protected $primaryKey = 'id_order';
   protected $useTimestamps = false;
   protected $allowedFields = ['check_in', 'check_out', 'tipe_kamar', 'harga', 'jumlah_order', 'username', 'nama', 'email', 'no_telephone', 'alamat', 'lama_hari', 'total_bayar', 'bukti_pembayaran', 'status', 'kode_booking', 'nama_bank'];

}