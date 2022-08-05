<!doctype html>
<html lang="es" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Nacho Fernandez y otros">
    <meta name="generator" content="NF 1.0.0">
    <title><?= $title ?? '' ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= $baseUrl ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= $baseUrl ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="d-flex flex-column h-100">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= $baseUrl ?>">FrameWork</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $baseUrl ?>home">Home</a>
                        </li>
                        <?php if($auth) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $baseUrl ?>logout">Salir</a>
                        </li>
                        <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $baseUrl ?>login">Ingresar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $baseUrl ?>register">Registrarme</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">