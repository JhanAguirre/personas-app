<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Municipios</title>
</head>
<body>
    <div class="container">
        <h1>Listado de Municipios</h1>
        <a href="{{ route('municipios.create') }}" class="btn btn-success mb-2">Crear Nuevo Municipio</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($municipios as $municipio)
                    <tr>
                        <td>{{ $municipio->muni_codi }}</td>
                        <td>{{ $municipio->muni_nomb }}</td>
                        <td>{{ $municipio->departamento ? $municipio->departamento->dep_nomb : 'N/A' }}</td>
                        <td>
                            <a href="{{ route('municipios.show', $municipio->muni_codi) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('municipios.edit', $municipio->muni_codi) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('municipios.destroy', $municipio->muni_codi) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No hay municipios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>