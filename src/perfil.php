<?php
require_once 'conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

$stmt = $conn->prepare("SELECT nombre, correo, fecha_nacimiento, numero_tarjeta, direccion_postal FROM usuarios WHERE id_usuario = ?");
$stmt->bind_param("i", $_SESSION['id_usuario']);
$stmt->execute();
$usuario = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$usuario) {
    header("Location: logout.php");
    exit;
}

$ultimosCuatro = substr($usuario['numero_tarjeta'], -4);
$tarjetaOculta = "**** **** **** " . $ultimosCuatro;

include 'navbar.php';
?>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card bg-black text-light border border-info border-opacity-50 shadow">
                <div class="card-header bg-dark border-bottom border-info border-opacity-50 py-3 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 fw-bold text-info">
                        <i class="bi bi-person-circle me-2"></i>Información del Usuario
                    </h4>
                    <span class="badge bg-info text-dark fw-bold">Sesión Activa</span>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="text-secondary small">Nombre Completo</label>
                            <p class="fw-semibold border-bottom border-secondary pb-2"><?= htmlspecialchars($usuario['nombre']) ?></p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-secondary small">Correo Electrónico</label>
                            <p class="fw-semibold border-bottom border-secondary pb-2"><?= htmlspecialchars($usuario['correo']) ?></p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-secondary small">Fecha de Nacimiento</label>
                            <p class="fw-semibold border-bottom border-secondary pb-2"><?= htmlspecialchars($usuario['fecha_nacimiento']) ?></p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-secondary small">Tarjeta Bancaria Registrada</label>
                            <p class="fw-semibold border-bottom border-secondary pb-2"><?= htmlspecialchars($tarjetaOculta) ?></p>
                        </div>
                        <div class="col-12">
                            <label class="text-secondary small">Dirección Postal de Envío</label>
                            <p class="fw-semibold border-bottom border-secondary pb-2"><?= htmlspecialchars($usuario['direccion_postal']) ?></p>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="catalogo.php" class="btn btn-info text-dark fw-bold"><i class="bi bi-box-seam me-1"></i>Ver Catálogo</a>
                        <a href="carrito.php" class="btn btn-outline-info"><i class="bi bi-cart me-1"></i>Ir a mi Carrito</a>
                        <a href="logout.php" class="btn btn-outline-danger ms-auto"><i class="bi bi-box-arrow-right me-1"></i>Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</main>