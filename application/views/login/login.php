<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url(); ?>"><b><?= $menu; ?></b><?= $judul; ?></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Silahkan login terlebih dahulu</p>
            <p class="login-box-msg"><?= $this->session->flashdata('message'); ?></p>

            <form action="<?= base_url('auth'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <hr>

            <p class="mb-1">
                <a href="<?= base_url('forgotpassword'); ?>">Lupa password?</a>
            </p>
            <p class="mb-0">
                <a href="<?= base_url('auth/register'); ?>" class="text-center">Daftar member</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->