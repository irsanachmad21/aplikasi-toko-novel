<?php

namespace App\Models;

use CodeIgniter\Model;

class NovelModel extends Model
{
    protected $table = 'novel';
    protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'tahun_terbit', 'jumlah_halaman', 'stok', 'harga', 'sampul'];

    public function getNovel($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function search($cari)
    {
        return $this->table('novel')->like('judul', $cari)->orLike('penulis', $cari)->
        orLike('penerbit', $cari)->orLike('tahun_terbit', $cari)->orLike('harga', $cari);
    }
}
