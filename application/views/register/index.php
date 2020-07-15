<div class="register-box">
    <div class="register-logo">
        <b><?= $menu; ?></b><?= $judul; ?>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Daftar jadi anggota baru</p>
            <p class="login-box-msg"><?= $this->session->flashdata('message'); ?></p>

            <form action="<?= base_url('auth/register'); ?>" method="post">
                <div class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <small class="text-danger"><?= form_error('username'); ?></small>
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nama lengkap" name="nama">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <small class="text-danger"><?= form_error('nama'); ?></small>
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <small class="text-danger"><?= form_error('email'); ?></small>
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="Password" name="password1">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <small class="text-danger"><?= form_error('password1'); ?></small>
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="Ulangi password" name="password2">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <small class="text-danger"><?= form_error('password2'); ?></small>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <hr>

            <a href="<?= base_url('auth'); ?>" class="text-center">Sudah punya akun?</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->