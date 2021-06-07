<?php
echo $this->extend('layout/template');
echo $this->section('content');
echo $this->include('layout/sidenav');
?>

<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="/tugas">Tugas</a></li>
              <li class="breadcrumb-item active" aria-current="page">Input Tugas</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-7 text-right">
          <a href="/tugas/addtugas" class="btn btn-sm btn-neutral">Tambah Tugas</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0 text-center">INPUT TUGAS E-BTQ</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="no">No</th>
                <th scope="col" class="sort" data-sort="nama surah">Nama Surah</th>
                <th scope="col" class="sort" data-sort="tugas">Tugas </th>
                <th scope="col" class="sort" data-sort="upload">Ambil Tugas</th>
                <th scope="col" class="sort" data-sort="validasi">Validasi</th>
                <th scope="col" class="sort" data-sort="completion">Kelengkapan</th>
              </tr>
            </thead>
            <tbody class="list">
              <?php $angka = 1; ?>
              <?php foreach ($tugas as $tgs) : ?>
                <tr>
                  <th scope="row"><?= $angka++ ?></th>
                  <td><?= $tgs['nama_surah'] ?></td>
                  <td><?= $tgs['tugas'] ?></td>
                  <td><input type="button" class="btn btn-sm btn-neutral" value="Ambil Tugas"></td>
                  <td><input type="button" class="btn btn-sm btn-neutral" value=""></td>
                  <td><input type="button" class="btn btn-sm btn-neutral" value=""></td>
                  <td><a href="/tugas/<?= $tgs['slug']; ?>"><input type="button" class="btn btn-sm btn-neutral" value="Detail"></a></td>
                </tr>
              <?php endforeach ?>
            </tbody>
            <div class="row mt-3">
              <?php
              if (isset($_GET['msg'])) {
                echo $_GET['msg'];
              }
              ?>
            </div>
        </div>
        <?= $this->endSection(); ?>