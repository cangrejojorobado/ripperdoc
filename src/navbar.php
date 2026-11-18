<?php
$paginaActual = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RipperDeck TCG - Tienda en Línea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-dark text-light d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-info border-opacity-50 shadow sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="index.php">
            <i class="bi bi-layers-half text-info fs-4"></i>
            <span>RipperDeck <span class="text-info">TCG</span></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuPrincipal">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $paginaActual === 'index.php' ? 'active fw-semibold text-info' : '' ?>" href="index.php">
                        <i class="bi bi-grid-fill me-1"></i>Catálogo
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $paginaActual === 'perfil.php' ? 'active fw-semibold text-info' : '' ?>" href="perfil.php">
                        <i class="bi bi-person-badge me-1"></i>Mi Perfil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $paginaActual === 'admin.php' ? 'active fw-semibold text-info' : '' ?>" href="admin.php">
                        <i class="bi bi-shield-lock me-1"></i>Administrador
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $paginaActual === 'contacto.php' ? 'active fw-semibold text-info' : '' ?>" href="contacto.php">
                        <i class="bi bi-envelope-paper me-1"></i>Contacto
                    </a>
                </li>
            </ul>

            <div class="d-flex flex-wrap gap-2 align-items-center">
                <a href="carrito.php" class="btn <?= $paginaActual === 'carrito.php' ? 'btn-info text-dark fw-bold' : 'btn-outline-info' ?> btn-sm">
                    <i class="bi bi-cart3 me-1"></i>Carrito <span class="badge bg-danger ms-1">0</span>
                </a>
                <a href="login.php" class="btn <?= $paginaActual === 'login.php' ? 'btn-light text-dark' : 'btn-outline-light' ?> btn-sm">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Iniciar Sesión
                </a>
                <a href="registro.php" class="btn btn-info text-dark fw-bold btn-sm">
                    <i class="bi bi-person-plus me-1"></i>Crear Cuenta
                </a>
            </div>
        </div>
    </div>
</nav>