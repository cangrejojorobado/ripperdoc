<?php
require_once 'conexion.php';

if (isset($_SESSION['id_usuario'])) {
    header("Location: perfil.php");
    exit;
}

$mensaje = "";
$tipoAlerta = "";
$nombre = "";
$correo = "";
$fecha_nacimiento = "";
$numero_tarjeta = "";
$direccion_postal = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre           = trim($_POST['nombre'] ?? '');
    $correo           = trim($_POST['correo'] ?? '');
    $password         = $_POST['password'] ?? '';
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $numero_tarjeta   = preg_replace('/\s+/', '', trim($_POST['numero_tarjeta'] ?? ''));
    $direccion_postal = trim($_POST['direccion_postal'] ?? '');

    if ($nombre === '' || $correo === '' || $password === '' || $fecha_nacimiento === '' || $numero_tarjeta === '' || $direccion_postal === '') {
        $mensaje = "Todos los campos son obligatorios.";
        $tipoAlerta = "warning";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "Ingresa un correo electrónico válido.";
        $tipoAlerta = "warning";
    } elseif (strlen($password) < 6) {
        $mensaje = "La contraseña debe tener al menos 6 caracteres.";
        $tipoAlerta = "warning";
    } else {
        $stmtCheck = $conn->prepare("SELECT id_usuario FROM usuarios WHERE correo = ?");
        $stmtCheck->bind_param("s", $correo);
        $stmtCheck->execute();
        $stmtCheck->store_result();

        if ($stmtCheck->num_rows > 0) {
            $mensaje = "Ya existe una cuenta registrada con ese correo electrónico.";
            $tipoAlerta = "danger";
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $stmtInsert = $conn->prepare(
                "INSERT INTO usuarios (nombre, correo, password, fecha_nacimiento, numero_tarjeta, direccion_postal)
                 VALUES (?, ?, ?, ?, ?, ?)"
            );
            $stmtInsert->bind_param("ssssss", $nombre, $correo, $passwordHash, $fecha_nacimiento, $numero_tarjeta, $direccion_postal);

            if ($stmtInsert->execute()) {
                $mensaje = "Cuenta creada correctamente. Ya puedes iniciar sesión con tu correo y contraseña.";
                $tipoAlerta = "success";
                $nombre = $correo = $fecha_nacimiento = $numero_tarjeta = $direccion_postal = "";
            } else {
                $mensaje = "Error al registrar la cuenta: " . $stmtInsert->error;
                $tipoAlerta = "danger";
            }
            $stmtInsert->close();
        }
        $stmtCheck->close();
    }
}

include 'navbar.php';
?>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card bg-black text-light border border-info border-opacity-50 shadow">
                <div class="card-header bg-dark border-bottom border-info border-opacity-50 py-3">
                    <h4 class="mb-0 fw-bold text-info">
                        <i class="bi bi-person-plus-fill me-2"></i>Crear Nueva Cuenta
                    </h4>
                </div>
                <div class="card-body p-4">

                    <?php if ($mensaje !== ""): ?>
                        <div class="alert alert-<?= $tipoAlerta ?> alert-dismissible fade show" role="alert">
                            <?= htmlspecialchars($mensaje) ?>
                            <?php if ($tipoAlerta === "success"): ?>
                                <div class="mt-2">
                                    <a href="login.php" class="btn btn-sm btn-dark fw-semibold">Ir a Iniciar Sesión</a>
                                </div>
                            <?php endif; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                        </div>
                    <?php endif; ?>

                    <form action="registro.php" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-light">Nombre Completo</label>
                                <input type="text" class="form-control bg-dark text-light border-secondary" name="nombre" value="<?= htmlspecialchars($nombre) ?>" placeholder="Ej. Emilio Cruz" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-light">Correo Electrónico</label>
                                <input type="email" class="form-control bg-dark text-light border-secondary" name="correo" value="<?= htmlspecialchars($correo) ?>" placeholder="correo@ejemplo.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-light">Contraseña</label>
                                <input type="password" class="form-control bg-dark text-light border-secondary" name="password" minlength="6" placeholder="Mínimo 6 caracteres" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-light">Fecha de Nacimiento</label>
                                <input type="date" class="form-control bg-dark text-light border-secondary" name="fecha_nacimiento" value="<?= htmlspecialchars($fecha_nacimiento) ?>" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-light">Número de Tarjeta Bancaria (16 dígitos)</label>
                                <input type="text" class="form-control bg-dark text-light border-secondary" name="numero_tarjeta" maxlength="16" value="<?= htmlspecialchars($numero_tarjeta) ?>" placeholder="4000123456789010" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold text-light">Dirección Postal</label>
                                <textarea class="form-control bg-dark text-light border-secondary" name="direccion_postal" rows="2" placeholder="Calle, número, colonia, código postal y ciudad" required><?= htmlspecialchars($direccion_postal) ?></textarea>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-info text-dark fw-bold btn-lg">Registrar Cuenta</button>
                            <a href="login.php" class="btn btn-outline-secondary text-light">¿Ya tienes cuenta? Inicia sesión aquí</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>