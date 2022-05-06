<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>shishaShop</title>
    <link rel="stylesheet" href="<?= URLROOT ?>/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600&amp;display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" />
    <link rel="stylesheet" href="<?= URLROOT ?>/fonts/font-awesome.min.css" />
    <link rel="stylesheet" href="<?= URLROOT ?>/fonts/ionicons.min.css" />
    <link rel="stylesheet" href="<?= URLROOT ?>/css/styles.min.css" />
    <link rel="stylesheet" href="<?= URLROOT ?>/css/styles.css" />
    <!-- FONT AWESOME ICONS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="d-flex flex-column min-vh-100"  style="padding-top: 65px;">
    <nav class="navbar fixed-top navbar-light navbar-expand-md text-center" style="background: var(--bs-yellow);position: fixed;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/sysdev-project/Admin" style="font-size: 30px">Shisha shop</a><button
                data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2">
                <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-2" style="width: 600px">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown">Products</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= URLROOT ?>/Admin/addHookah">Add a hookah</a>
                            <a class="dropdown-item" href="<?= URLROOT ?>/Admin/addAccessory">Add an accessory</a>
                            <a class="dropdown-item" href="<?= URLROOT ?>/Admin/manageProduct">Manage products</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown">Settings</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= URLROOT ?>/Admin/changeEmail">Change email</a>
                            <a class="dropdown-item" href="<?= URLROOT ?>/Admin/changePassword">Change password</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown">Edit</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= URLROOT ?>/Admin/editContactUs">Edit Contact Us</a>
                            <a class="dropdown-item" href="<?= URLROOT ?>/Admin/editAboutUs">Edit About Us</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URLROOT ?>/Admin/previewDatabase">Preview Database</a>
                    </li>
                </ul>
                <a href="<?= URLROOT ?>/Admin/logout" style="text-decoration: none; margin-right: 0; margin-left: auto"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
            </div>
        </div>
        <!-- <form class="d-flex me-auto navbar-form" target="_self">
                    <div class="d-flex align-items-center">
                        <label class="form-label d-flex mb-0" for="search-field">
                            <button class="btn btn-primary" type="button" style="background: rgba(26, 26, 26, 0); background-repeat: no-repeat;">
                                <i class="fa fa-search fs-4" style="margin: 10px"></i>
                            </button>
                        </label>
                        <input class="form-control search-field" type="search" id="search-field-1" name="search" style="border-radius: 30px" placeholder="Search by name" />
                    </div>
                </form> -->
    </nav>