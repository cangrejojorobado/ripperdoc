<?php
require_once 'conexion.php';

if (isset($_SESSION['id_usuario'])) {
    header("Location: perfil.php");
    exit;
}

$error = "";
$correo = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo   = trim($_POST['correo'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($correo === '' || $password === '') {
        $error = "Por favor ingresa tu correo y contraseña.";
    } else {
        $stmt = $conn->prepare("SELECT id_usuario, nombre, correo, password FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($usuario = $resultado->fetch_assoc()) {
            if (password_verify($password, $usuario['password']) || $password === $usuario['password']) {
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                $_SESSION['nombre']     = $usuario['nombre'];
                $_SESSION['correo']     = $usuario['correo'];

                header("Location: perfil.php");
                exit;
            } else {
                $error = "Contraseña incorrecta.";
            }
        } else {
            $error = "No existe ninguna cuenta asociada a ese correo electrónico.";
        }
        $stmt->close();
    }
}

include 'navbar.php';
?>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card bg-black text-light border border-info border-opacity-50 shadow">
                <div class="card-header bg-dark border-bottom border-info border-opacity-50 py-3 text-center">
                    <h4 class="mb-0 fw-bold text-info">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión
                    </h4>
                </div>
                <div class="card-body p-4">

                    <?php if ($error !== ""): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i><?= htmlspecialchars($error) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                        </div>
                    <?php endif; ?>

                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-light">Correo Electrónico</label>
                            <input type="email" class="form-control bg-dark text-light border-secondary" name="correo" value="<?= htmlspecialchars($correo) ?>" placeholder="correo@ejemplo.com" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-light">Contraseña</label>
                            <input type="password" class="form-control bg-dark text-light border-secondary" name="password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-info text-dark fw-bold btn-lg">Entrar</button>
                            <a href="registro.php" class="btn btn-outline-secondary text-light">Crear una cuenta nueva</a>
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