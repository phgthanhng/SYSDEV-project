<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>shishaShop</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600&amp;display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/fonts/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/fonts/ionicons.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Bungee+Shade&family=Heebo:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100" style="  background-color: #fdf1ec;
">
    <nav class="navbar sticky-top navbar-light navbar-expand-md text-center" style="background: var(--bs-yellow); position: sticky">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo URLROOT; ?>/Home/index" style="font-size: 30px">Shisha Shop</a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-2" style="width: 600px">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown">Products</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo URLROOT; ?>/Hookah/index">Hookah</a>
                            <a class="dropdown-item" href="<?php echo URLROOT; ?>/Accessories/index">Accessory</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/Contact/index">Contact us</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/AboutUs/index">about Us</a></li>
                </ul>
                <form class="d-flex me-auto navbar-form" target="_self">
                    <div class="d-flex align-items-center">
                        <label class="form-label d-flex mb-0" for="search-field">
                            <button class="btn btn-primary" type="button" style="background: rgba(26, 26, 26, 0); background-repeat: no-repeat;">
                                <i class="fa fa-search fs-4" style="margin: 10px"></i>
                            </button>
                        </label>
                        <input class="form-control search-field" type="search" id="search-field-1" name="search" style="border-radius: 30px" placeholder="Search by name" />
                    </div>
                </form>
                <a href="<?php echo URLROOT; ?>/Admin/login" style="text-decoration: none; margin-right: 15px"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
            </div>
        </div>
    </nav>