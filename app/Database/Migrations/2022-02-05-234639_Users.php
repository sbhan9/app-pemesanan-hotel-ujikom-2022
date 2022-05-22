<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'          => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'nama_lengkap'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type' => 'TEXT',
            ],
            'id_level' => [
                'type' => 'INT',
                'default' => 3
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
        ]);
        
        $this->forge->addForeignKey('id_level', 'level', 'id');
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('tb_users');
    }

    public function down()
    {
        $this->forge->dropTable('tb_users');
    }
}