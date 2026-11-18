<?php include 'navbar.php'; ?>

<main class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0"><i class="bi bi-shield-lock-fill text-warning me-2"></i>Panel de Administración</h2>
        <span class="badge bg-dark fs-6">Gestión de Inventario y Ventas</span>
    </div>

    <div class="row g-4">
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="mb-0 fw-bold">Agregar / Modificar Producto TCG</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-2">
                            <label class="form-label small fw-semibold">Nombre del Producto</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Ej. Booster Box Magic">
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="col-6">
                                <label class="form-label small fw-semibold">Precio</label>
                                <input type="number" step="0.01" class="form-control form-control-sm">
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-semibold">Cantidad en Almacén</label>
                                <input type="number" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="col-6">
                                <label class="form-label small fw-semibold">Fabricante</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-semibold">Origen</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label small fw-semibold">Descripción</label>
                            <textarea class="form-control form-control-sm" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Foto del Producto (BLOB)</label>
                            <input type="file" class="form-control form-control-sm">
                        </div>
                        <button type="button" class="btn btn-warning w-100 fw-bold">Guardar Producto</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">Reporte de Productos en Inventario</h5>
                </div>
                <div class="card-body">
                    <p class="text-secondary mb-0">Aquí se desplegará la tabla con los 30+ productos en stock y botones de edición.</p>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">Historial Global de Compras</h5>
                </div>
                <div class="card-body">
                    <p class="text-secondary mb-0">Aquí se mostrará la tabla relacional con las compras realizadas por los usuarios.</p>
                </div>
            </div>
        </div>
    </div>
</main>