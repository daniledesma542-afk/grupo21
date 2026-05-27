<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Ondas de Sanación</title>
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Panel de Administración</h2>
            <span class="badge bg-primary fs-6">Admin</span>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">Usuarios registrados</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ auth()->user()->id }}</td>
                                    <td>{{ auth()->user()->name }}</td>
                                    <td>{{ auth()->user()->email }}</td>
                                    <td><span class="badge bg-success">{{ auth()->user()->rol }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">Accesos rápidos</h5>
                    </div>
                    <div class="card-body d-grid gap-3">
                        <a href="#" class="btn btn-outline-primary">Gestionar productos</a>
                        <a href="#" class="btn btn-outline-secondary">Ver pedidos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>