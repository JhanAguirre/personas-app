<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Crear Nueva Comuna</title>
</head>
<body>
    <div class="container">
        <h1>Crear Nueva Comuna</h1>
        <form action="{{ route('comunas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="comu_nomb" class="form-label">Nombre de la Comuna:</label>
                <input type="text" class="form-control @error('comu_nomb') is-invalid @enderror" id="comu_nomb" name="comu_nomb" value="{{ old('comu_nomb') }}" required>
                @error('comu_nomb')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="muni_codi" class="form-label">Municipio:</label>
                <select class="form-select @error('muni_codi') is-invalid @enderror" id="muni_codi" name="muni_codi" required>
                    <option value="">Seleccionar Municipio</option>
                    @foreach ($municipios as $municipio)
                        <option value="{{ $municipio->muni_codi }}" {{ old('muni_codi') == $municipio->muni_codi ? 'selected' : '' }}>
                            {{ $municipio->muni_nomb }}
                        </option>
                    @endforeach
                </select>
                @error('muni_codi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('comunas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>