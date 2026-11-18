<?php include 'navbar.php'; ?>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-dark text-white py-3 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 fw-bold"><i class="bi bi-person-circle text-warning me-2"></i>Información del Usuario</h4>
                    <span class="badge bg-warning text-dark">Vista de Perfil</span>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="text-secondary small">Nombre Completo</label>
                            <p class="fw-semibold border-bottom pb-2">Usuario de Prueba</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-secondary small">Correo Electrónico</label>
                            <p class="fw-semibold border-bottom pb-2">jugador@ripperdeck.com</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-secondary small">Fecha de Nacimiento</label>
                            <p class="fw-semibold border-bottom pb-2">2003-05-15</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-secondary small">Tarjeta Bancaria Registrada</label>
                            <p class="fw-semibold border-bottom pb-2">**** **** **** 4242</p>
                        </div>
                        <div class="col-12">
                            <label class="text-secondary small">Dirección Postal de Envío</label>
                            <p class="fw-semibold border-bottom pb-2">Av. Universidad 100, Ciudad de México</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mt-3">
                        <a href="carrito.php" class="btn btn-dark"><i class="bi bi-cart me-1"></i>Ir a mi Carrito</a>
                        <a href="login.php" class="btn btn-outline-danger"><i class="bi bi-box-arrow-right me-1"></i>Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>