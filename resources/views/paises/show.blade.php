<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Detalles del País</title>
</head>
<body>
    <div class="container">
        <h1>Detalles del País</h1>
        <p><strong>Código:</strong> {{ $pais->pais_codi }}</p>
        <p><strong>Nombre:</strong> {{ $pais->pais_nomb }}</p>
        <a href="{{ route('paises.index') }}" class="btn btn-secondary">Volver al Listado</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>