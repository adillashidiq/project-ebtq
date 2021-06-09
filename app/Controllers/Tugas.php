<?php

namespace App\Controllers;

use App\Models\TugasModel;
use CodeIgniter\HTTP\Request;

class Tugas extends BaseController

// return = 1 keluaran saja
// echo bisa banyak keluaran
{
  protected $tugasModel;

  public function __construct()
  {
    $this->tugasModel = new TugasModel();
  }

  public function index()
  {
    // $tugas = $this->tugasModel->findAll();
    $data = [
      'title' => 'Tugas | E-BTQ HMJ TI',
      'tugas' => $this->tugasModel->getTugas()
    ];
    return view('tugas/index', $data);
  }

  public function addtugas()
  {
    // session();
    $data = [
      'title' => 'Tambah Tugas | E-BTQ HMJ TI',
      'validation' => \Config\Services::validation()
    ];
    return view('tugas/add-tugas', $data);
  }

  public function detail($slug)
  {
    $data = [
      'title' => 'Detail Tugas | E-BTQ HMJ TI',
      'tugas' => $this->tugasModel->getTugas($slug)
    ];

    if (empty($data['tugas'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama tugas ' . $slug . ' tidak ditemukan');
    }

    return view('tugas/detail', $data);
  }

  public function input()
  {
    if (!$this->validate([
      'nama_surah' => [
        'rules' => 'required|is_unique[tugas.nama_surah]',
        'errors' => [
          'required' => 'Nama surah harus diisi',
          'is_unique' => 'Nama surah sudah terdaftar'
        ]
      ],
      'tugas' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Deskripsi tugas harus diisi'
        ]
      ]
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->to('/tugas/addtugas')->withInput()->with('validation', $validation);
    }

    $slug = url_title($this->request->getVar('nama_surah'), '-', true);

    $this->tugasModel->save([
      'nama_surah' => $this->request->getVar('nama_surah'),
      'slug' => $slug,
      'tugas' => $this->request->getVar('tugas'),
    ]);

    session()->setFlashdata('pesan', 'Berhasil menambahkan tugas baru');

    return redirect()->to('/tugas');
  }
}
