<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $judul . $title; ?>
    </title>

    <!-- Css Style -->
    <link rel="stylesheet" href="<?= base_url('asset/bootstrap/css/'); ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('asset/fontawesome/css/'); ?>all.css">
    <link rel="stylesheet" href="<?= base_url('asset/css/'); ?>style.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('asset/img/'); ?>favicon.png" type="image/x-icon">

</head>

<body>

    <header class="header">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="row mt-4 mb-4">
                    <div class="col-lg-1">
                        <a href="<?= base_url(); ?>" class="logo-link">
                            <img src="<?= base_url('asset/img/'); ?>logo-big.png" width="90" alt="" class="logo-big ml-5 mr-2">
                        </a>
                    </div>
                    <div class="col-lg-11">
                        <a href="<?= base_url(); ?>" class="brand-big-link">
                            <label class="brand-big mt-2"><?= $title; ?></label>
                        </a>
                        <label class="sub-brand"><?= $subtitle; ?></label>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-5 mr-5">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu drop-1 bg-dark" aria-labelledby="navbarDropdown">
                                    <li class="nav-item"><a class="dropdown-item" href="#">Action</a></li>
                                    <li class="nav-item"><a class="dropdown-item" href="#">Another action</a></li>
                                    <li class="nav-item dropdown-submenu"><a class="dropdown-item" href="#">Something else here</a>
                                        <ul class="dropdown-menu drop-2 bg-dark">
                                            <li class="nav-item"><a class="dropdown-item" href="#">Action</a></li>
                                            <li class="nav-item"><a class="dropdown-item" href="#">Another action</a></li>
                                            <li class="nav-item dropdown-submenu"><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Disabled</a>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </header>