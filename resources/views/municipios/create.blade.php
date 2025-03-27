<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Crear Nuevo Municipio</title>
</head>
<body>
    <div class="container">
        <h1>Crear Nuevo Municipio</h1>
        <form action="{{ route('municipios.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="muni_nomb" class="form-label">Nombre del Municipio:</label>
                <input type="text" class="form-control @error('muni_nomb') is-invalid @enderror" id="muni_nomb" name="muni_nomb" value="{{ old('muni_nomb') }}" required>
                @error('muni_nomb')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="depa_codi" class="form-label">Departamento:</label>
                <select class="form-select @error('depa_codi') is-invalid @enderror" id="depa_codi" name="depa_codi" required>
                    <option value="">Seleccionar Departamento</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->depa_codi }}" {{ old('depa_codi') == $departamento->depa_codi ? 'selected' : '' }}>
                            {{ $departamento->depa_nomb }}
                        </option>
                    @endforeach
                </select>
                @error('depa_codi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('municipios.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>