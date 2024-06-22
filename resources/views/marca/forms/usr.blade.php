<div class="form-group">
	<label for="">Codigo</label>
	
	<input {{ $operation ? 'readonly' : '' }} type="text"  class="form-control" name="CodMarca" id="idMarca" value="{{ old('CodMarca', $marca->CodMarca)  }}" placeholder = 'Ingresa el Codigo del marca'>
	
	@error('CodMarca')
      <span class="text-danger ">{{ $message }}</span>
    @enderror

</div>

<div class="form-group">
	<label for="">Nombre del Marca:</label>
	<input type="text"  class="form-control" name="NomMarca" id="NomMarca" value="{{ old('NomMarca', $marca->NomMarca)  }}" placeholder = 'Ingresa el Nombre de Marca'>
	@error('NomMarca')
      <span class="text-danger ">{{ $message }}</span>
    @enderror
</div>
