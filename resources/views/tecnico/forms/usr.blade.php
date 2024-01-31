<div class="form-group">
	<label for="">Codigo</label>
	
	<input {{ $operation ? 'readonly' : '' }} type="text"  class="form-control" name="CodTecnico" id="idTecnico" value="{{ old('CodTecnico', $tecnico->CodTecnico)  }}" placeholder = 'Ingresa el Codigo del tecnico'>
	
	@error('CodTecnico')
      <span class="text-danger ">{{ $message }}</span>
    @enderror

</div>

<div class="form-group">
	<label for="">Nombre del Tecnico:</label>
	<input type="text"  class="form-control" name="NomTecnico" id="NomTecnico" value="{{ old('NomTecnico', $tecnico->NomTecnico)  }}" placeholder = 'Ingresa el Nombre del Tecnico'>
	@error('NomTecnico')
      <span class="text-danger ">{{ $message }}</span>
    @enderror
</div>
