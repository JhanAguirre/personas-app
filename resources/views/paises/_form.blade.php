<div class="form-group">
    <label for="muni_nomb">Nombre del Municipio:</label>
    <input type="text" class="form-control" id="muni_nomb" name="muni_nomb" value="{{ old('muni_nomb', $municipio->muni_nomb ?? '') }}" required>
    @error('muni_nomb')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="dep_codi">Departamento:</label>
    <select class="form-control" id="dep_codi" name="dep_codi">
        <option value="">Seleccionar Departamento</option>
        @foreach ($departamentos ?? [] as $departamento)
            <option value="{{ $departamento->dep_codi }}"
                @if(isset($municipio) && $municipio->dep_codi == $departamento->dep_codi) selected @endif>
                {{ $departamento->dep_nomb }}
            </option>
        @endforeach
    </select>
    @error('dep_codi')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ isset($municipio) ? 'Actualizar' : 'Guardar' }}</button>
<a href="{{ route('municipios.index') }}" class="btn btn-secondary">Cancelar</a>