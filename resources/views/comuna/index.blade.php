<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Comunas</title>
</head>
<body>
    <div class="container">
        <h1>Listado de Comunas</h1>
        <a href="{{ route('comunas.create') }}" class="btn btn-success mb-2">Crear Nueva Comuna</a>

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
                    <th>Municipio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($comunas as $comuna)
                    <tr>
                        <td>{{ $comuna->comu_codi }}</td>
                        <td>{{ $comuna->comu_nomb }}</td>
                        <td>{{ $comuna->municipio ? $comuna->municipio->muni_nomb : 'N/A' }}</td>
                        <td>
                            <a href="{{ route('comunas.show', $comuna->comu_codi) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('comunas.edit', $comuna->comu_codi) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('comunas.destroy', $comuna->comu_codi) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No hay comunas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>