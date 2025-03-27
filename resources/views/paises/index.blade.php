<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Países</title>
</head>
<body>
    <div class="container">
        <h1>Listado de Países</h1>
        <a href="{{ route('paises.create') }}" class="btn btn-success mb-2">Crear Nuevo País</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Capital</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($paises as $pais)
                    <tr>
                        <td>{{ $pais->pais_codi }}</td>
                        <td>{{ $pais->pais_nomb }}</td>
                        <td>{{ $pais->pais_capi ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('paises.show', $pais->pais_codi) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('paises.edit', $pais->pais_codi) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('paises.destroy', $pais->pais_codi) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No hay países registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>