<?= $this->extend('auth/template/index'); ?>

<?= $this->section('content'); ?>
<div class="min-vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #4e73df 0%, #36b9cc 100%);">
    <div class="col-md-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-white mt-2">TiNgaji</h2>
        </div>
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-header bg-white">
                <h3 class="text-center font-weight-light my-2"><?=lang('Auth.loginTitle')?></h3>
            </div>
            <div class="card-body">
                <?= view('Myth\\Auth\\Views\\_message_block') ?>
                <form action="<?= url_to('login') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-floating mb-3 position-relative">
                        <input class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" type="text" placeholder="<?=lang('Auth.emailOrUsername')?>" />
                        <label for="login"><i class="fas fa-user me-2"></i><?=lang('Auth.emailOrUsername')?></label>
                        <div class="invalid-feedback"><?= session('errors.login') ?></div>
                    </div>
                    <div class="form-floating mb-3 position-relative">
                        <input class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" type="password" placeholder="<?=lang('Auth.password')?>" />
                        <label for="password"><i class="fas fa-lock me-2"></i><?=lang('Auth.password')?></label>
                        <div class="invalid-feedback"><?= session('errors.password') ?></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" name="remember" type="checkbox" />
                            <label class="form-check-label text-muted"><?=lang('Auth.rememberMe')?></label>
                        </div>
                        <a href="<?= url_to('forgot') ?>" class="small text-primary">Lupa password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 fs-5" style="border-radius:0.5rem;"><?=lang('Auth.loginAction')?></button>
                </form>
            </div>
            <div class="card-footer text-center py-3 bg-white">
                <div class="small"><a href="<?= url_to('register') ?>"><?=lang('Auth.needAnAccount')?></a></div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>             