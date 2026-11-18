<?php 
require_once 'conexion.php';
include 'navbar.php'; 

// novedades
$sql_novedades = "SELECT id_producto, nombre, precio, cantidad_almacen, fabricante, origen, fotos FROM productos ORDER BY id_producto DESC LIMIT 5";
$resultado_novedades = $conn->query($sql_novedades);
?>

<header class="bg-black text-white py-5 border-bottom border-info border-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="badge bg-info text-dark fw-bold mb-2">Arma tu Mazo Definitivo</span>
                <h1 class="display-5 fw-bold mb-3">La tienda que piensa en ti</h1>
                <p class="lead text-secondary mb-3">
                    Encuentra Play Booster Boxes, Starter Decks, cartas sueltas, accesorios de protección, y mas de tus productos favoritos.
                </p>
                <div class="d-flex gap-2">
                    <a href="catalogo.php" class="btn btn-info text-dark fw-bold btn-lg">Explorar Catalogo</a>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block text-center">
                <i class="bi bi-box-seam text-info display-1"></i>
            </div>
        </div>
    </div>
</header>

<main class="container py-5" id="catalogo">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0 text-info">Novedades</h2>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
        <?php if ($resultado_novedades && $resultado_novedades->num_rows > 0): ?>
            <?php while ($prod = $resultado_novedades->fetch_assoc()): ?>
                <div class="col">
                    <div class="card h-100 bg-dark text-light border border-secondary shadow-sm">
                        <div class="ratio ratio-4x3 bg-black d-flex align-items-center justify-content-center">
                            <?php if (!empty($prod['fotos'])): ?>
                                <img src="data:image/jpeg;base64,<?= base64_encode($prod['fotos']) ?>" class="card-img-top object-fit-contain p-2" alt="<?= htmlspecialchars($prod['nombre']) ?>">
                            <?php else: ?>
                                <i class="bi bi-image text-secondary fs-2"></i>
                            <?php endif; ?>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-secondary mb-2 align-self-start"><?= htmlspecialchars($prod['fabricante']) ?></span>
                            <h6 class="card-title fw-bold text-info text-truncate"><?= htmlspecialchars($prod['nombre']) ?></h6>
                            <p class="card-text text-secondary small flex-grow-1 mb-2">
                                Origen: <?= htmlspecialchars($prod['origen']) ?>
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top border-secondary">
                                <span class="fw-bold text-light">$<?= number_format($prod['precio'], 2) ?></span>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">
                                    Stock: <?= $prod['cantidad_almacen'] ?>
                                </span>
                            </div>
                        </div>
                        <div class="card-footer bg-black border-0 pb-3">
                            <a href="carrito.php?agregar=<?= $prod['id_producto'] ?>" class="btn btn-info text-dark fw-bold w-100 btn-sm">
                                <i class="bi bi-cart-plus me-1"></i>Agregar
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-dark text-center border border-info text-info py-4" role="alert">
                    <i class="bi bi-info-circle fs-3 mb-2 d-block"></i>
                    <h5 class="fw-bold">No hay productos nuevos registrados todavía</h5>
                    <p class="mb-0 text-secondary">Agrega tus primeros productos TCG desde el panel de administración.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>