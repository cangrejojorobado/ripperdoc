<?php include 'navbar.php'; ?>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-dark text-white py-3 text-center">
                    <h4 class="mb-0 fw-bold"><i class="bi bi-box-arrow-in-right text-warning me-2"></i>Iniciar Sesión</h4>
                </div>
                <div class="card-body p-4">
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Correo Electrónico</label>
                            <input type="email" class="form-control" name="correo" placeholder="correo@ejemplo.com" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Contraseña</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning fw-bold btn-lg">Entrar</button>
                            <a href="registro.php" class="btn btn-outline-secondary">Crear una cuenta nueva</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>