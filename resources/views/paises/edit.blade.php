<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar País</title>
</head>
<body>
    <div class="container">
        <h1>Editar País</h1>
        <form action="{{ route('paises.update', $pais->pais_codi) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="pais_codi" class="form-label">Código del País:</label>
                <input type="text" class="form-control @error('pais_codi') is-invalid @enderror" id="pais_codi" name="pais_codi" value="{{ old('pais_codi', $pais->pais_codi) }}" required readonly>
                @error('pais_codi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pais_nomb" class="form-label">Nombre del País:</label>
                <input type="text" class="form-control @error('pais_nomb') is-invalid @enderror" id="pais_nomb" name="pais_nomb" value="{{ old('pais_nomb', $pais->pais_nomb) }}" required>
                @error('pais_nomb')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pais_capi" class="form-label">Capital del País:</label>
                <input type="text" class="form-control" id="pais_capi" name="pais_capi" value="{{ old('pais_capi', $pais->pais_capi) }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('paises.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>