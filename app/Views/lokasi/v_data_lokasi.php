<!-- Header with Breadcrumb -->
<div class="d-flex justify-content-between align-items-center mt-4 mb-4">
    <div>
        <h1 class="h3 mb-1 text-gray-800">Data Lokasi</h1>
        <p class="text-muted">Kelola data lokasi MDTA & TPQ</p>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('Home/dashboard') ?>" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Lokasi</li>
        </ol>
    </nav>
</div>

<!-- Flash Message -->
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        <?= session()->getFlashdata('pesan') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- Data Table Card -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-table me-2"></i>Daftar Lokasi MDTA & TPQ
        </h6>
        <?php if (in_groups('admin')) : ?>
            <a href="<?= base_url('Lokasi/inputLokasi') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i>Tambah Lokasi
            </a>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="datatablesSimple" width="100%" cellspacing="0">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th width="20%">Nama Lokasi</th>
                        <th width="25%">Alamat Lokasi</th>
                        <th width="15%">Koordinat</th>
                        <th width="20%">Foto</th>
                        <?php if (in_groups('admin')) : ?>
                            <th width="15%">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($lokasi as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td>
                                <strong><?= $value['nama_lokasi'] ?></strong>
                            </td>
                            <td><?= $value['alamat_lokasi'] ?></td>
                            <td>
                                <span class="badge bg-info">
                                    <i class="fas fa-map-marker-alt me-1"></i>
                                    <?= $value['latitude'] ?>, <?= $value['longitude'] ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <?php if ($value['foto_lokasi'] && file_exists('foto/' . $value['foto_lokasi'])) : ?>
                                    <img src="<?= base_url('foto/' . $value['foto_lokasi']) ?>" 
                                         class="img-thumbnail" 
                                         style="width: 80px; height: 60px; object-fit: cover;"
                                         data-bs-toggle="modal" 
                                         data-bs-target="#imageModal<?= $value['id_lokasi'] ?>"
                                         role="button"
                                         title="Klik untuk melihat gambar lebih besar">
                                <?php else : ?>
                                    <span class="text-muted">
                                        <i class="fas fa-image fa-2x"></i>
                                        <br><small>No Image</small>
                                    </span>
                                <?php endif; ?>
                            </td>
                            
                            <?php if (in_groups('admin')) : ?>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="<?= base_url('Lokasi/editLokasi/' . $value['id_lokasi']) ?>" 
                                           class="btn btn-warning btn-sm" 
                                           title="Edit Lokasi">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('Lokasi/deleteLokasi/' . $value['id_lokasi']) ?>" 
                                           class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                           title="Hapus Lokasi">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            <?php endif; ?>
                        </tr>
                        
                        <!-- Image Modal -->
                        <?php if ($value['foto_lokasi'] && file_exists('foto/' . $value['foto_lokasi'])) : ?>
                            <div class="modal fade" id="imageModal<?= $value['id_lokasi'] ?>" tabindex="-1" aria-labelledby="imageModalLabel<?= $value['id_lokasi'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel<?= $value['id_lokasi'] ?>">
                                                Foto <?= $value['nama_lokasi'] ?>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="<?= base_url('foto/' . $value['foto_lokasi']) ?>" 
                                                 class="img-fluid" 
                                                 alt="<?= $value['nama_lokasi'] ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>