<?php
echo $this->extend('layout/template');

if (!isset($_SESSION['admin'])) {
    header("Location: /pages/login");
}

echo $this->section('content');
echo $this->include('layout/sidenav');
?>

<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Tugas</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/tugas">Tugas</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Tugas</li>
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
                <div class="card-header border-0">
                    <h3 class="mb-0">EDIT TUGAS E-BTQ</h3>
                </div>
                <!-- Light table -->
                <tr>
                    <div class="card-body">
                        <form action="/tugas/update/<?= $tugas['id']; ?>" method="post">
                            <!-- cross site resource forgery -->
                            <?= csrf_field(); ?>
                            <input type="hidden" name="slug" value="<?= $tugas['slug']; ?>">
                            <div class="row mb-3">
                                <label for="nama_surah" class="col-sm-2 col-form-label">Nama surah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_surah')) ? 'is-invalid' : ''; ?>" id="nama_surah" name="nama_surah" value="<?= (old('nama_surah')) ? old('nama_surah') : $tugas['nama_surah']; ?>">
                                    <div id="nama_surah" class="invalid-feedback">
                                        <?= $validation->getError('nama_surah'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="tugas" class="col-sm-2 col-form-label">Deskripsi tugas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('tugas')) ? 'is-invalid' : ''; ?>" id="tugas" name="tugas" value="<?= (old('tugas')) ? old('tugas') : $tugas['tugas']; ?>">
                                    <div id="tugas" class="invalid-feedback">
                                        <?= $validation->getError('tugas'); ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit-tugas">Ubah Tugas</button>
                        </form>
                </tr>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>