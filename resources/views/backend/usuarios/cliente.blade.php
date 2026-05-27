<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta - Ondas de Sanación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Ondas de Sanación</a>
            <div class="d-flex text-white align-items-center">
                <span class="me-3">Hola, <strong>{{ auth()->user()->name }}</strong></span>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm text-center pt-4 pb-3 h-100">
                    <h4 class="mb-1">{{ auth()->user()->name }}</h4>
                    <p class="text-muted mb-3">{{ auth()->user()->email }}</p>
                    <div>
                        <span class="badge bg-info text-dark fs-6">Cliente</span>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm h-100 py-4">
                            <div class="card-body text-center">
                                <h5 class="card-title">Mi carrito</h5>
                                <p class="card-text text-muted">Revisá los productos que agregaste</p>
                                <a href="#" class="btn btn-primary px-4 mt-2">Ver carrito</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm h-100 py-4">
                            <div class="card-body text-center">
                                <h5 class="card-title">Productos</h5>
                                <p class="card-text text-muted">Explorá nuestro catálogo de sanación</p>
                                <a href="#" class="btn btn-outline-primary px-4 mt-2">Ver productos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>