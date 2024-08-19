<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class NovelSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul'             => 'Koala Kumal',
                'penulis'           => 'Raditya Dika',
                'penerbit'          => 'Gagas Media',
                'tahun_terbit'      => '2015',
                'jumlah_halaman'    => 260,
                'stok'              => 100,
                'harga'             => 65000,
                'sampul'            => 'koala_kumal.jpeg',
                'created_at'        => Time::now(),
                'updated_at'        => Time::now()
            ],
            [
                'judul'             => 'Jomblo Sebuah Komedi Cinta',
                'penulis'           => 'Adhitya Mulya',
                'penerbit'          => 'Gagas Media',
                'tahun_terbit'      => '2003',
                'jumlah_halaman'    => 175,
                'stok'              => 100,
                'harga'             => 25000,
                'sampul'            => 'jomblo.jpg',
                'created_at'        => Time::now(),
                'updated_at'        => Time::now()
            ],
            [
                'judul'             => 'Marmut Merah Jambu',
                'penulis'           => 'Radhitya Dika',
                'penerbit'          => 'Bukuné',
                'tahun_terbit'      => '2010',
                'jumlah_halaman'    => 228,
                'stok'              => 100,
                'harga'             => 25000,
                'sampul'            => 'marmut_merah_jambu.jpg',
                'created_at'        => Time::now(),
                'updated_at'        => Time::now()
            ],
            [
                'judul'             => 'Skripsick',
                'penulis'           => 'Chara Perdana',
                'penerbit'          => 'Penerbit Matahari',
                'tahun_terbit'      => '2014',
                'jumlah_halaman'    => 143,
                'stok'              => 100,
                'harga'             => 30000,
                'sampul'            => 'skripsick.jpg',
                'created_at'        => Time::now(),
                'updated_at'        => Time::now()
            ],
            [
                'judul'             => 'Bajak Laut & Purnama Terakhir',
                'penulis'           => 'Adhitya Mulya',
                'penerbit'          => 'Gagas Media',
                'tahun_terbit'      => '2016',
                'jumlah_halaman'    => 30,
                'stok'              => 100,
                'harga'             => 35000,
                'sampul'            => 'bajak_laut.jpg',
                'created_at'        => Time::now(),
                'updated_at'        => Time::now()
            ],
            [
                'judul'             => 'Manusia Setengah Salmon',
                'penulis'           => 'Radhitya Dika',
                'penerbit'          => 'Gagas Media',
                'tahun_terbit'      => '2017',
                'jumlah_halaman'    => 272,
                'stok'              => 100,
                'harga'             => 55000,
                'sampul'            => 'manusia_setengah_salmon.png',
                'created_at'        => Time::now(),
                'updated_at'        => Time::now()
            ],
            [
                'judul'             => '(Ex)perience',
                'penulis'           => 'Reza Pahlevi',
                'penerbit'          => 'Gagas Media',
                'tahun_terbit'      => '2016',
                'jumlah_halaman'    => 188,
                'stok'              => 100,
                'harga'             => 65000,
                'sampul'            => 'experience.jpg',
                'created_at'        => Time::now(),
                'updated_at'        => Time::now()
            ],
            [
                'judul'             => 'Cinta Brontosaurus',
                'penulis'           => 'Radhitya Dika',
                'penerbit'          => 'Gagas Media',
                'tahun_terbit'      => '2017',
                'jumlah_halaman'    => 208,
                'stok'              => 100,
                'harga'             => 52000,
                'sampul'            => 'cinta_brontosaurus.png',
                'created_at'        => Time::now(),
                'updated_at'        => Time::now()
            ],
            [
                'judul'             => 'Ubur ubur Lembur',
                'penulis'           => 'Radhitya Dika',
                'penerbit'          => 'Gagas Media',
                'tahun_terbit'      => '2017',
                'jumlah_halaman'    => 232,
                'stok'              => 100,
                'harga'             => 60000,
                'sampul'            => 'ubur_ubur_lembur.jpg',
                'created_at'        => Time::now(),
                'updated_at'        => Time::now()
            ],
            [
                'judul'             => 'Setengah Jalan',
                'penulis'           => 'Ernest Prakasa',
                'penerbit'          => 'BFirst',
                'tahun_terbit'      => '2017',
                'jumlah_halaman'    => 151,
                'stok'              => 100,
                'harga'             => 30000,
                'sampul'            => 'setengah_jalan.jpg',
                'created_at'        => Time::now(),
                'updated_at'        => Time::now()
            ]
        ];

        // Using Query Builder
        $this->db->table('novel')->insertBatch($data);
    }
}