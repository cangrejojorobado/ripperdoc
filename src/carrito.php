<?php include 'navbar.php'; ?>

<main class="container py-5">
    <h2 class="fw-bold mb-4"><i class="bi bi-cart3 text-warning me-2"></i>Carrito de Compras</h2>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">Artículos Seleccionados</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info mb-0">
                        <i class="bi bi-info-circle me-2"></i>Sección de carrito lista para listar los productos del usuario, modificar cantidades y actualizar el inventario.
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="mb-0 fw-bold">Resumen de Compra</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-secondary">Subtotal:</span>
                        <span class="fw-semibold">$0.00 MXN</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-secondary">Envío:</span>
                        <span class="text-success fw-semibold">Gratis</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fs-5 fw-bold">Total:</span>
                        <span class="fs-5 fw-bold text-primary">$0.00 MXN</span>
                    </div>
                    <button class="btn btn-warning w-100 fw-bold" disabled>Finalizar Compra</button>
                    <a href="index.php" class="btn btn-outline-secondary w-100 mt-2">Seguir Comprando</a>
                </div>
            </div>
        </div>
    </div>
</main>