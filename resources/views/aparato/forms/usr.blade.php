<div class="form-group">
	<label for="">Codigo</label>
	
	<input {{ $operation ? 'readonly' : '' }} type="text"  class="form-control" name="CodAparato" id="idAparato" value="{{ old('CodAparato', $aparato->CodAparato)  }}" placeholder = 'Ingresa el Codigo del aparato'>
	
	@error('CodAparato')
      <span class="text-danger ">{{ $message }}</span>
    @enderror

</div>

<div class="form-group">
	<label for="">Nombre del Aparato:</label>
	<input type="text"  class="form-control" name="NomAparato" id="NomAparato" value="{{ old('NomAparato', $aparato->NomAparato)  }}" placeholder = 'Ingresa el Nombre de Aparato'>
	@error('NomAparato')
      <span class="text-danger ">{{ $message }}</span>
    @enderror
</div>
