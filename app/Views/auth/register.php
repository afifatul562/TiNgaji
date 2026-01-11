<?= $this->extend('auth/template/index'); ?>

<?= $this->section('content'); ?>
<div class="min-vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #4e73df 0%, #36b9cc 100%);">
    <div class="col-md-6">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-white mt-2">TiNgaji</h2>
        </div>
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-header bg-white">
                <h3 class="text-center font-weight-light my-2">Daftar Akun</h3>
            </div>
            <div class="card-body">
                <?= view('Myth\\Auth\\Views\\_message_block') ?>
                <form action="<?= url_to('register') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-floating mb-3 position-relative">
                        <input class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" type="email" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>" />
                        <label for="email"><i class="fas fa-envelope me-2"></i><?=lang('Auth.email')?></label>
                        <div class="invalid-feedback"><?= session('errors.email') ?></div>
                        <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                    </div>
                    <div class="form-floating mb-3 position-relative">
                        <input class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" type="text" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>" />
                        <label for="username"><i class="fas fa-user me-2"></i><?=lang('Auth.username')?></label>
                        <div class="invalid-feedback"><?= session('errors.username') ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0 position-relative">
                                <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                                <label for="password"><i class="fas fa-lock me-2"></i><?=lang('Auth.password')?></label>
                                <div class="invalid-feedback"><?= session('errors.password') ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0 position-relative">
                                <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                                <label for="pass_confirm"><i class="fas fa-lock me-2"></i><?=lang('Auth.repeatPassword')?></label>
                                <div class="invalid-feedback"><?= session('errors.pass_confirm') ?></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 fs-5" style="border-radius:0.5rem;">Daftar</button>
                </form>
            </div>
            <div class="card-footer text-center py-3 bg-white">
                <div class="small"><a href="<?= url_to('login') ?>">Sudah punya akun? Masuk</a></div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>   