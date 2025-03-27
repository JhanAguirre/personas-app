<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Departamento</title>
</head>
<body>
    <div class="container">
        <h1>Editar Departamento</h1>
        <form action="{{ route('departamentos.update', $departamento->dep_codi) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="dep_nomb" class="form-label">Nombre del Departamento:</label>
                <input type="text" class="form-control @error('dep_nomb') is-invalid @enderror" id="dep_nomb" name="dep_nomb" value="{{ old('dep_nomb', $departamento->dep_nomb) }}" required>
                @error('dep_nomb')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pais_codi" class="form-label">País:</label>
                <select class="form-select @error('pais_codi') is-invalid @enderror" id="pais_codi" name="pais_codi" required>
                    <option value="">Seleccionar País</option>
                    @foreach ($paises as $pais)
                        <option value="{{ $pais->pais_codi }}" {{ old('pais_codi', $departamento->pais_codi) == $pais->pais_codi ? 'selected' : '' }}>
                            {{ $pais->pais_nomb }}
                        </option>
                    @endforeach
                </select>
                @error('pais_codi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>