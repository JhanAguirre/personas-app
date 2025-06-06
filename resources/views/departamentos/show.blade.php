<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Detalles del Departamento</title>
</head>
<body>
    <div class="container">
        <h1>Detalles del Departamento</h1>
        <p><strong>ID:</strong> {{ $departamento->depa_codi }}</p>
        <p><strong>Nombre:</strong> {{ $departamento->dep_nomb }}</p>
        <p><strong>País:</strong> {{ $departamento->pais ? $departamento->pais->pais_nomb : 'N/A' }}</p>
        <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">Volver al Listado</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>