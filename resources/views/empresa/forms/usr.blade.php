<div class="form-group">
	<label for="">Codigo</label>
	
	<input {{ $operation ? 'readonly' : '' }} type="text"  class="form-control" name="CodEmpresa" id="idEmpresa" value="{{ old('CodEmpresa', $empresa->CodEmpresa)  }}" placeholder = 'Ingresa el Codigo del empresa'>
	
	@error('CodEmpresa')
      <span class="text-danger ">{{ $message }}</span>
    @enderror

</div>

<div class="form-group">
	<label for="">Nombre del Empresa:</label>
	<input type="text"  class="form-control" name="NomEmpresa" id="NomEmpresa" value="{{ old('NomEmpresa', $empresa->NomEmpresa)  }}" placeholder = 'Ingresa el Nombre de Empresa'>
	@error('NomEmpresa')
      <span class="text-danger ">{{ $message }}</span>
    @enderror
</div>
