<?php

namespace App\Controllers;

use App\Models\Model_Biodata;
use App\Models\NovelModel;

class NovelController extends BaseController
{

    protected $novelModel;

    public function __construct()
    {
        $this->novelModel = new NovelModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_novel') ? $this->request->getVar('page_novel') : 1;

        $cari = $this->request->getVar('cari');
        if ($cari) {
            $novel = $this->novelModel->search($cari);
        } else {
            $novel = $this->novelModel;
        }

        $data = [
            'novel' => $novel->paginate(5, 'novel'),
            'pager' => $this->novelModel->pager,
            'currentPage' => $currentPage,
            'cari' => $cari
        ];
        return view('adminview', $data);
    }

    public function customerView()
    {
        $currentPage = $this->request->getVar('page_novel') ? $this->request->getVar('page_novel') : 1;

        $cari = $this->request->getVar('cari');
        if ($cari) {
            $novel = $this->novelModel->search($cari);
        } else {
            $novel = $this->novelModel;
        }

        $data = [
            'novel' => $novel->paginate(5, 'novel'),
            'pager' => $this->novelModel->pager,
            'currentPage' => $currentPage,
            'cari' => $cari
        ];
        return view('customerview', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate(
            [
                'judul' => 'required|is_unique[novel.judul]',
                'penulis' => 'required',
                'penerbit' => 'required',
                'tahun_terbit' => 'required',
                'jumlah_halaman' => 'required',
                'stok' => 'required',
                'harga' => 'required'
            ],
            [
                'sampul' => [
                    'rules' => 'max_size[sampul, 2048]|is_image[sampul]|mime_in[sampul, image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran sampul terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ]
            ]
        )) {
            $validation = \Config\Services::validation();
            return redirect()->to('/NovelController/create')->withInput()->with('validation', $validation);
            // return redirect()->to('/NovelController/create')->withInput();
        }

        // ambil gambarnya
        $fileSampul = $this->request->getFile('sampul');
        // ambil nama file sampul
        $namaSampul = $fileSampul->getName();
        // apakah tidak ada gambar yang diupload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {
            // pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
            // ambil nama file sampul
            $namaSampul = $fileSampul->getName();
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->novelModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'jumlah_halaman' => $this->request->getVar('jumlah_halaman'),
            'stok' => $this->request->getVar('stok'),
            'harga' => $this->request->getVar('harga'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Novel Berhasil Ditambahkan🙌');

        return redirect()->to('/novelcontroller/index');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $novel = $this->novelModel->find($id);

        // cek jika file gambarnya default
        if ($novel['sampul'] != 'default.png') {
            // hapus gambar
            unlink('img/' . $novel['sampul']);
        }

        $this->novelModel->delete($id);
        session()->setFlashdata('pesan', 'Novel Berhasil Dihapus🙌');

        return redirect()->to('/novelcontroller/index');
    }

    public function edit($slug)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'novel' => $this->novelModel->getNovel($slug)
        ];

        return view('edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'sampul' => [
                'rules' => 'max_size[sampul, 2048]|is_image[sampul]|mime_in[sampul, image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran sampul terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/NovelController/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');

        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $namaSampul = $fileSampul->getName();
            // pindahkan gambar ke folder img
            $fileSampul->move(FCPATH . 'img', $namaSampul);

            // hapus file lama jika ada dan bukan default.png
            $fileLama = FCPATH . 'img/' . $this->request->getVar('sampulLama');
            if ($this->request->getVar('sampulLama') !== 'default.png' && file_exists($fileLama)) {
                unlink($fileLama);
            }
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->novelModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'jumlah_halaman' => $this->request->getVar('jumlah_halaman'),
            'stok' => $this->request->getVar('stok'),
            'harga' => $this->request->getVar('harga'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Novel Berhasil Diubah🙌');

        return redirect()->to('/novelcontroller/index');
    }



    public function detail($slug)
    {
        $data = [
            'novel' => $this->novelModel->getNovel($slug),
        ];

        // jika novel tidak tersedia
        if (empty($data['novel'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Novel ' . $slug . ' Tidak Ditemukan');
        }

        return view('detailnovel', $data);
    }

    public function cart()
    {
    }

    public function getNovel($id)
    {
        $novel = $this->novelModel->find($id);
        return $this->response->setJSON($novel);
    }
}
