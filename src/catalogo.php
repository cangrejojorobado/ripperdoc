<?php 
require_once 'conexion.php';
include 'navbar.php'; 

$busqueda = trim($_GET['busq'] ?? '');

if ($busqueda !== '') {
    $stmt = $conn->prepare("SELECT id_producto, nombre, descripcion, precio, cantidad_almacen, fabricante, origen, fotos FROM productos WHERE nombre LIKE ? OR descripcion LIKE ? OR fabricante LIKE ? ORDER BY id_producto DESC");
    $like = "%" . $busqueda . "%";
    $stmt->bind_param("sss", $like, $like, $like);
    $stmt->execute();
    $resultado = $stmt->get_result();
} else {
    $sql = "SELECT id_producto, nombre, descripcion, precio, cantidad_almacen, fabricante, origen, fotos FROM productos ORDER BY id_producto DESC";
    $resultado = $conn->query($sql);
}
?>

<main class="container py-5">
    <div class="row mb-5 align-items-center">
        <div class="col-lg-6 mb-3 mb-lg-0">
            <h2 class="fw-bold text-info mb-1"><i class="bi bi-search me-2"></i>Catálogo</h2>
            <p class="text-secondary mb-0">Explora todos los artículos disponibles o busca por nombre, juego o fabricante</p>
        </div>
        <div class="col-lg-6">
            <form action="catalogo.php" method="GET" class="d-flex gap-2">
                <div class="input-group">
                    <span class="input-group-text bg-black border-secondary text-info"><i class="bi bi-search"></i></span>
                    <input type="text" name="busq" class="form-control bg-dark text-light border-secondary" placeholder="Ej. Booster, Magic, Gundam..." value="<?= htmlspecialchars($busqueda) ?>">
                </div>
                <button type="submit" class="btn btn-info text-dark fw-bold px-4">Buscar</button>
                <?php if ($busqueda !== ''): ?>
                    <a href="catalogo.php" class="btn btn-outline-secondary d-flex align-items-center" title="Limpiar búsqueda"><i class="bi bi-x-lg"></i></a>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <?php if ($busqueda !== ''): ?>
        <div class="mb-4">
            <p class="text-secondary">Mostrando resultados para: <strong class="text-info"><?= htmlspecialchars($busqueda) ?></strong></p>
        </div>
    <?php endif; ?>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <?php if ($resultado && $resultado->num_rows > 0): ?>
            <?php while ($prod = $resultado->fetch_assoc()): ?>
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
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-secondary"><?= htmlspecialchars($prod['fabricante']) ?></span>
                                <small class="text-secondary"><?= htmlspecialchars($prod['origen']) ?></small>
                            </div>
                            <h5 class="card-title fw-bold text-info text-truncate"><?= htmlspecialchars($prod['nombre']) ?></h5>
                            <p class="card-text text-secondary small flex-grow-1 mb-2">
                                <?= htmlspecialchars(substr($prod['descripcion'], 0, 85)) ?>...
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top border-secondary">
                                <span class="fs-5 fw-bold text-light">$<?= number_format($prod['precio'], 2) ?></span>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">
                                    Stock: <?= $prod['cantidad_almacen'] ?>
                                </span>
                            </div>
                        </div>
                        <div class="card-footer bg-black border-0 pb-3">
                            <a href="carrito.php?agregar=<?= $prod['id_producto'] ?>" class="btn btn-info text-dark fw-bold w-100 btn-sm">
                                <i class="bi bi-cart-plus me-1"></i>Agregar al Carrito
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-dark text-center border border-info text-info py-5" role="alert">
                    <i class="bi bi-search fs-1 mb-3 d-block text-secondary"></i>
                    <h4 class="fw-bold">No se encontraron productos</h4>
                    <p class="text-secondary mb-3">Ningún artículo coincide con tu término de búsqueda.</p>
                    <a href="catalogo.php" class="btn btn-outline-info">Ver todo el catálogo</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>