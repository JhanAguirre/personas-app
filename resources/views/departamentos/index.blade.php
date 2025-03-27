<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Departamentos</title>
</head>
<body>
    <div class="container">
        <h1>Listado de Departamentos</h1>
        <a href="{{ route('departamentos.create') }}" class="btn btn-success mb-2">Crear Nuevo Departamento</a>

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
                    <th>País</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($departamentos as $departamento)
                    <tr>
                        <td>{{ $departamento->depa_codi }}</td>
                        <td>{{ $departamento->dep_nomb }}</td>
                        <td>{{ $departamento->pais ? $departamento->pais->pais_nomb : 'N/A' }}</td>
                        <td>
                            <a href="{{ route('departamentos.show', $departamento->depa_codi) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('departamentos.edit', $departamento->depa_codi) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('departamentos.destroy', $departamento->depa_codi) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No hay departamentos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>