<?php

namespace App\Controllers;

use App\Models\TugasModel;

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
    $data = [
      'title' => 'Tambah Tugas | E-BTQ HMJ TI'
    ];
    return view('tugas/add-tugas', $data);
  }


  public function detail($slug)
  {
    $data = [
      'title' => 'Detail Tugas | E-BTQ HMJ TI',
      'tugas' => $this->tugasModel->getTugas($slug)
    ];

    return view('tugas/detail', $data);
  }
}
