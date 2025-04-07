<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Novel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'penulis' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'penerbit' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'tahun_terbit' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'harga' => [
                'type'          => 'DOUBLE',
                'constraint'    => '11,2',
            ],
            'stok' => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'jumlah_halaman' => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'sampul' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'created_at' => [
                'type'          => 'DATETIME',
                null            => true,
            ],
            'updated_at' => [
                'type'          => 'DATETIME',
                null            => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('novel');
    }

    public function down()
    {
        $this->forge->dropTable('novel');
    }
}
