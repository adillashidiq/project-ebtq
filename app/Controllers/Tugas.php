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
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama surah harus diisi',
          // 'is_unique' => 'Nama surah sudah terdaftar'
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

  public function delete($id)
  {
    $this->tugasModel->delete($id);
    session()->setFlashdata('pesan', 'Berhasil menghapus tugas');
    return redirect()->to('/tugas');
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Edit Tugas | E-BTQ HMJ TI',
      'validation' => \Config\Services::validation(),
      'tugas' => $this->tugasModel->getTugas($slug)
    ];
    return view('tugas/edit-tugas', $data);
  }

  public function update($id)
  {


    if (!$this->validate([
      'nama_surah' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama surah harus diisi',
          // 'is_unique' => 'Nama surah sudah terdaftar'
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
      return redirect()->to('/tugas/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
    }

    $slug = url_title($this->request->getVar('nama_surah'), '-', true);

    $this->tugasModel->save([
      'id' => $id,
      'nama_surah' => $this->request->getVar('nama_surah'),
      'slug' => $slug,
      'tugas' => $this->request->getVar('tugas'),
    ]);

    session()->setFlashdata('pesan', 'Berhasil merubah data tugas');

    return redirect()->to('/tugas');
  }
}
