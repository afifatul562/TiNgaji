<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GIS | My Profile</title>
        
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <!-- Data Table -->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('sb-admin/') ?>js/datatables-simple-demo.js"></script>

        <link href= "<?= base_url('sb-admin/') ?>css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html"><i class="fas fa-mosque fa-lg"></i> TiNgaji</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" 
                    data-bs-toggle="dropdown" aria-expanded="false"><img class="img-profile rounded-circle" src="<?= base_url() ?>/foto/<?= user()->user_image; ?>" 
                    style="width: 30px; height: 30px;"> <?= user()->username; ?> </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> 
                            Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <hr class="sidebar-divider">

                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?= base_url('Home/dashboard') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                                Dashboard
                            </a>

                            <hr class="sidebar-divider">

                            <div class="sb-sidenav-menu-heading">Detail</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-atlas"></i></div>
                                Geo View
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url('Home/viewMap')?>">
                                        <div class="sb-nav-link-icon"><i class="fas fa-map"></i></div>
                                        View Map
                                    </a>

                                    <a class="nav-link" href="<?= base_url('Home/baseMap') ?>">
                                        <div class="sb-nav-link-icon"><i class="fas fa-layer-group"></i></div>
                                        Base Map
                                    </a>

                                    <a class="nav-link" href="<?= base_url('Home/marker') ?>">
                                        <div class="sb-nav-link-icon"><i class="fas fa-map-marker-alt"></i></div>
                                        Marker
                                    </a>

                                    <a class="nav-link" href="<?= base_url('Home/circle') ?>">
                                        <div class="sb-nav-link-icon"><i class="fas fa-circle"></i></div>
                                        Circle
                                    </a>

                                    <a class="nav-link" href="<?= base_url('Home/getcoordinat') ?>">
                                        <div class="sb-nav-link-icon"><i class="fas fa-map-marked-alt"></i></div>
                                        Get Coordinat
                                    </a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></i></div>
                                Lokasi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                                <?php if( in_groups('admin')) : ?>

                                    <a class="nav-link" href="<?= base_url('Lokasi/inputLokasi')?>">
                                        <div class="sb-nav-link-icon"><i class="fas fa-thumbtack"></i></div>    
                                        Input Lokasi</a>
                                    <a class="nav-link" href="<?= base_url('Lokasi/pemetaanLokasi')?>">
                                        <div class="sb-nav-link-icon"><i class="fas fa-map"></i></div>
                                        Pemetaan Lokasi</a>

                                        <?php endif; ?>

                                    <a class="nav-link" href="<?= base_url('Lokasi/index')?>">
                                        <div class="sb-nav-link-icon"><i class="fas fa-map-pin"></i></div>
                                        Data Lokasi</a>
                                </nav>
                                </div>

                                <?php if( in_groups('admin')) : ?>

                                <hr class="sidebar-divider">
                                <a class="nav-link" href="<?= base_url('User/index') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>
                                User List
                                </a>

                                <?php endif; ?>

                            <hr class="sidebar-divider">

                            <a class="nav-link" href="<?= base_url('logout') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                Logout
                            </a>

                            <hr class="sidebar-divider">
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Web-GIS by</div>
                        Afifatul Mawaddah
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <!-- Header with Breadcrumb -->
                        <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                            <div>
                                <h1 class="h3 mb-1 text-gray-800">My Profile</h1>
                                <p class="text-muted">Informasi profil pengguna</p>
                            </div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="<?= base_url('Home/dashboard') ?>" class="text-decoration-none">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">My Profile</li>
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

                        <div class="row">
                            <!-- Profile Card -->
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            <i class="fas fa-user me-2"></i>Profile Picture
                                        </h6>
                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </a>
                                    </div>
                                    <div class="card-body text-center">
                                        <img src="<?= base_url('foto/' . user()->user_image) ?>" 
                                             class="img-profile rounded-circle mb-3" 
                                             style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #e3e6f0;"
                                             alt="Profile Picture">
                                        <h5 class="mb-1"><?= user()->username ?></h5>
                                        <p class="text-muted mb-3">
                                            <?= in_groups('admin') ? 'Administrator' : 'Regular User' ?>
                                        </p>
                                        <div class="row text-center">
                                            <div class="col-6">
                                                <div class="border-end">
                                                    <h6 class="mb-0">Member Since</h6>
                                                    <small class="text-muted"><?= date('M Y', strtotime(user()->created_at)) ?></small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h6 class="mb-0">Status</h6>
                                                <small class="text-success">Active</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Profile Details -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 bg-white">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            <i class="fas fa-info-circle me-2"></i>Profile Information
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <p class="mb-0 text-muted">Username</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">
                                                    <i class="fas fa-user me-2"></i><?= user()->username ?>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <p class="mb-0 text-muted">Email</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">
                                                    <i class="fas fa-envelope me-2"></i><?= user()->email ?>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <p class="mb-0 text-muted">Full Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">
                                                    <i class="fas fa-id-card me-2"></i><?= user()->full_name ?? 'Not set' ?>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <p class="mb-0 text-muted">Role</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <span class="badge <?= in_groups('admin') ? 'bg-success' : 'bg-info' ?>">
                                                    <i class="fas fa-user-shield me-1"></i>
                                                    <?= in_groups('admin') ? 'Administrator' : 'Regular User' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <p class="mb-0 text-muted">Created At</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">
                                                    <i class="fas fa-calendar me-2"></i><?= date('d M Y H:i', strtotime(user()->created_at)) ?>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <p class="mb-0 text-muted">Last Updated</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">
                                                    <i class="fas fa-clock me-2"></i><?= date('d M Y H:i', strtotime(user()->updated_at)) ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Account Actions -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 bg-white">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            <i class="fas fa-cog me-2"></i>Account Actions
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <a href="#" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                                    <i class="fas fa-key me-1"></i>Change Password
                                                </a>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <a href="#" class="btn btn-warning btn-block" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                                    <i class="fas fa-edit me-1"></i>Edit Profile
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; TiNgaji <?= date('Y') ?></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #f8f9fa; border-radius: 10px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('sb-admin/') ?>js/scripts.js"></script>
    </body>
</html>

