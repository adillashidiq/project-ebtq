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
              <li class="breadcrumb-item active" aria-current="page"><?= $tugas['slug']; ?></li>
            </ol>
          </nav>
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
        <div class="card text-center">
          <div class="card-header">
            DETAIL TUGAS
          </div>
          <div class="card-body">
            <h1 class="card-title"><?= 'Surah ' . $tugas['nama_surah']; ?></h1>
            <p class="card-text"><b><?= $tugas['tugas']; ?></b></p>

            <!-- Button -->
            <div class="my-5">
              <a href="/tugas/edit/<?= $tugas['slug']; ?>" class="btn btn-outline-warning btn-sm">edit</a>
              <form action="/tugas/<?= $tugas['id']; ?>" method="post" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">delete</button>
              </form>
              <a href="#" class="btn btn-outline-primary btn-sm">validasi</a>
              <a href="#" class="btn btn-outline-dark btn-sm">kelengkapan</a>
              <a href="#" class="btn btn-outline-success btn-sm">ambil tugas</a>
            </div>

            <div class="card-footer text-muted text-sm">
              Dibuat pada <br> <?= $tugas['created_at']; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?= $this->endSection(); ?>