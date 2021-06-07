<?php

namespace App\Controllers;

class Pages extends BaseController

// return = 1 keluaran saja
// echo bisa banyak keluaran
{
  public function index()
  {
    $data = [
      'title' => 'Home | E-BTQ HMJ TI'
    ];
    return view('pages/admin/home', $data);
  }
  public function admin()
  {
    $data = [
      'title' => 'Admin | E-BTQ HMJ TI'
    ];
    return view('pages/admin/admin', $data);
  }
  public function profil()
  {
    $data = [
      'title' => 'Profil | E-BTQ HMJ TI'
    ];
    return view('pages/admin/profil', $data);
  }
  public function act()
  {
    $data = [
      'title' => 'Action | E-BTQ HMJ TI'
    ];
    return view('pages/admin/act', $data);
  }
  public function changepwd()
  {
    $data = [
      'title' => 'Setting Password | E-BTQ HMJ TI'
    ];
    return view('pages/admin/changepwd', $data);
  }
  public function login()
  {
    $data = [
      'title' => 'Login | E-BTQ HMJ TI'
    ];
    return view('pages/admin/login', $data);
  }
}
