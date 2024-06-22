<style>
	.fixed-width {
		width: 180px; /* Ajusta este valor según tus necesidades */
		max-width: 180px; /* Ancho máximo fijo */
	}
	.cb-fixed-width {
		width: 200px; /* Ajusta este valor según tus necesidades */
		max-width: 200px; /* Ancho máximo fijo */
	}
	.cb-empresa-fixed-width {
		width: 300px; /* Ajusta este valor según tus necesidades */
		max-width: 300px; /* Ancho máximo fijo */
	}
</style>

<div class='d-flex flex-wrap justify-content-between'>
 		<div class="form-group fixed-width">
			<label>Solicitud de Service:</label>
			  <div class="input-group" id="solicitudservice" data-target-input="nearest">
				  <input type="text" class="form-control" name="CodRepar"    data-target="#solicitudservice" value="{{ old('CodRepar', $reparar->CodRepar)  }}" readonly />
			  </div>
		</div>

		<div class="form-group fixed-width">
			<label>Boleta Nº:</label>
			  <div class="input-group"  data-target-input="nearest">
				  <input type="text" class="form-control" name="boletanro" id="boletanro"   data-target="#boletanro"  />
			  </div>
		</div>
		<div class="form-group fixed-width">
			<label>Fecha de Entrada:</label>
			  <div class="input-group date" id="FecEntrada" data-target-input="nearest">
				  <input type="text" class="form-control datepicker"  name="FecEntrada"  value='{{ old('FecEntrada', optional($reparar->FecEntrada)->format('d/m/Y')) }}' />
				  <div class="input-group-append"    data-toggle="datepicker">
					  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
				  </div>
			  </div>
			  @error('FecEntrada')
      				<span class="text-danger ">{{ $message }}</span>
    		  @enderror
		 </div>
</div>

<div class='d-flex flex-wrap'>
	<div class="form-group cb-empresa-fixed-width">
		<label>Empresas :</label>
		<select class="ComboBox form-control" name="CodEmpresa">
			@foreach($empresas as $empresa)
				<option value="{{ $empresa->CodEmpresa }}" 
					{{ old('CodEmpresa', $reparar->CodEmpresa) == $empresa->CodEmpresa ? 'selected' : '' }} 
					> {{ $empresa->NomEmpresa }}</option>
			@endforeach
		</select>
	</div>
	
	<div class="mx-2"></div> <!-- Espacio entre los inputs -->

	<div class='form-group flex-grow-1'>
		 <label>Razon social :</label>
	      <div class='input-group' id="ClientEmpresa" data-target-input="nearest">
			  <input type="text" class="form-control" name="ClientEmpresa"
			  value="{{ old('ClientEmpresa', $reparar->ClientEmpresa)  }}" />
		  </div>
		  @error('ClientEmpresa')
      				<span class="text-danger ">{{ $message }}</span>
    	  @enderror
	</div>
</div> 

<div class='d-flex flex-wrap'>
	
	<div class="form-group cb-empresa-fixed-width" >
		<label >Localidad :</label>
		<select class="ComboBox form-control" name="Localidad">
			@foreach($departamentos as $departamento)
				<option value="{{ $departamento->CodDepart }}" 
					{{ old('Localidad', $reparar->Localidad) == $departamento->CodDepart ? 'selected' : '' }} >				
				{{ $departamento->NomDepart }}</option>
			@endforeach
		</select>
	</div>	 

	<div class="mx-2"></div> <!-- Espacio entre los inputs -->


	<div class='form-group flex-grow-1'>
		<label>Domicilio :</label>
		 <div class='input-group' id="Domicilio" data-target-input="nearest">
			 <input type="text" name="Domicilio" class="form-control"
			 value="{{ old('Domicilio', $reparar->Domicilio)  }}"
			 />
		 </div>
		 @error('Domicilio')
      				<span class="text-danger ">{{ $message }}</span>
    	 @enderror
   </div>

   <div class="mx-2"></div> <!-- Espacio entre los inputs -->

   <div class='form-group flex-grow-1'>
		<label>Telefono :</label>
		<div class='input-group' id="Telefono" data-target-input="nearest">
			<input type="text" name="Telefono" class="form-control" data-target="#telefono"
			value="{{ old('Telefono', $reparar->Telefono)  }}"
			/>
		</div>
		@error('Telefono')
			<span class="text-danger ">{{ $message }}</span>
		@enderror
	</div>
   

</div> 


<div class='d-flex flex-wrap'>
	
	<div class="form-group cb-empresa-fixed-width">
		<label>Casa Vendedora :</label>
		<select class="ComboBox form-control" name="EmpresaVendedora">
			@foreach($empresas as $empresa)
				<option value="{{ $empresa->CodEmpresa }}"
				{{ old('EmpresaVendedora', $reparar->EmpresaVendedora) == $empresa->CodEmpresa ? 'selected' : '' }} 					
					>{{ $empresa->NomEmpresa }}</option>
			@endforeach
		</select>
		@error('EmpresaVendedora')
			<span class="text-danger ">{{ $message }}</span>
		@enderror
	</div>

	<div class="mx-2"></div> <!-- Espacio entre los inputs -->


	<div class="form-group fixed-width">
		<label>Fecha de Compra:</label>
		  <div class="input-group date" id="FecCompra" data-target-input="nearest">
			  <input type="text" class="form-control datepicker"  name="FecCompra"  value='{{ old('FecCompra', optional($reparar->FecCompra)->format('d/m/Y')) }}' />
			  <div class="input-group-append"  data-toggle="datepicker">
				  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
			  </div>
		  </div>
		  @error('FecCompra')
				  <span class="text-danger ">{{ $message }}</span>
		  @enderror
	 </div>
	

	 <div class="mx-2"></div> <!-- Espacio entre los inputs -->

   <div class='form-group flex-grow-1'>
		<label>Factura Nro :</label>
		<div class='input-group' id="NroFactura" data-target-input="nearest">
			<input type="text" name="NroFactura" class="form-control" data-target="#facturanro"
			value="{{ old('NroFactura', $reparar->NroFactura)  }}"
			/>
		</div>
		@error('NroFactura')
		<span class="text-danger ">{{ $message }}</span>
	   @enderror
	</div>

</div> 


<div class='d-flex flex-wrap'>
	
	<div class="form-group cb-fixed-width" id="CodAparato">
		<label >Aparatos :</label>
		<select class="ComboBox form-control" name="CodAparato" >
			@foreach($aparatos as $aparato)
				<option value="{{ $aparato->CodAparato }}"
				{{ old('CodAparato', $reparar->CodAparato) == $aparato->CodAparato ? 'selected' : '' }} 										
					>{{ $aparato->NomAparato }}</option>
			@endforeach
		</select>
	</div>	 


	<div class="mx-2"></div> <!-- Espacio entre los inputs -->

	<div class='form-group flex-grow-1'>
		<label>Modelo :</label>
		 <div class='input-group' id="Modelo" data-target-input="nearest">
			 <input type="text" class="form-control" name="Modelo"
			 value="{{ old('Modelo', $reparar->Modelo)  }}"
			 />
		 </div>
		 @error('Modelo')
		    <span class="text-danger ">{{ $message }}</span>
		 @enderror
 
	</div>

	<div class="mx-2"></div> <!-- Espacio entre los inputs -->

	<div class="form-group cb-fixed-width">
		<label>Marcas :</label>
		<select class="ComboBox form-control" name="CodMarca" >
			@foreach($marcas as $marca)
				<option value="{{ $marca->CodMarca }}"
					{{ old('CodMarca', $reparar->CodMarca) == $marca->CodMarca ? 'selected' : '' }} 															
					>{{ $marca->NomMarca }}</option>
			@endforeach
		</select>
	</div>	 

	<div class="mx-2"></div> <!-- Espacio entre los inputs -->

	<div class='form-group flex-grow-1'>
		<label>Nº Serie :</label>
		 <div class='input-group' id="NroSerie" data-target-input="nearest">
			 <input type="text"  class="form-control" name="NroSerie" data-target="#serienro"
			 value="{{ old('NroSerie', $reparar->NroSerie)  }}"
			 />
		 </div>
		 @error('NroSerie')
		 		<span class="text-danger ">{{ $message }}</span>
	 	 @enderror		 
	</div>

</div> 

<div class='d-flex flex-wrap'>
	<div class="form-group flex-grow-1">
		<label>Accesosorios</label>
		<textarea class="form-control" rows="3" name="Accesorios" placeholder="accesorios...">{{ old('Accesorios', $reparar->Accesorios)}}</textarea>
		@error('Accesorios')
     	  <span class="text-danger ">{{ $message }}</span>
		@enderror	
	</div>
		 

</div> 

<div class='d-flex flex-wrap'>
	<div class="form-group flex-grow-1">
		<label>Observaciones</label>
		<textarea   id="observaciones" name="Observaciones" class="form-control" rows="3" placeholder="observaciones...">{{ old('Observaciones', $reparar->Observaciones)}}</textarea>
		@error('Observaciones')
   		   <span class="text-danger ">{{ $message }}</span>
	    @enderror		 
	</div>

</div> 

<div class='d-flex flex-wrap justify-content-between'>
	
	<div class='form-group'>
		
		 <div class='input-group' id="ImporteCotiz" data-target-input="nearest">
			<label>Presupuesto : </label>
			 <input type="text" name="ImporteCotiz"  class="form-control ml-1" 
			 value="{{ old('ImporteCotiz', $reparar->ImporteCotiz)}}"
			 />
		 </div>

		 @error('ImporteCotiz')
     		<span class="text-danger ">{{ $message }}</span>
		 @enderror	
	</div>

	

	<div class="form-group">
		<input type="hidden" name="FueraZona" value="N">
		<div class="custom-control custom-switch">
		<input type="checkbox" class="custom-control-input" id="FueraZona"  name="FueraZona"
		{{ old('FueraZona', $reparar->FueraZona) == "S" ? 'checked' : '' }}
		value="S"
		onchange="updateCheckboxValue(this)"
		>
		<label class="custom-control-label" for="FueraZona">Fuera de Zona</label>
		</div>
		@error('FueraZona')
			<span class="text-danger ">{{ $message }}</span>
		@enderror	

	</div>

	<div class="form-group">
		<input type="hidden" name="Garantia" value="N">
		<div class="custom-control custom-switch">
		<input type="checkbox" class="custom-control-input" id="Garantia" name="Garantia" 
		{{ old('Garantia', $reparar->Garantia) == "S" ? 'checked'  : ''  }}
		value="S"
		onchange="updateCheckboxValue(this)"
		>
		<label class="custom-control-label" for="Garantia">Presenta Garantia</label>
		</div>

		@error('Garantia')
			<span class="text-danger ">{{ $message }}</span>
		@enderror	
	</div>
	<div class="form-group">
	</div>
</div>  


<div class="form-group fixed-width">
	<label>Fecha de consulta:</label>
	<div class="input-group date" id="FecConsulta" data-target-input="nearest">
		<input type="text" class="form-control datepicker" name="FecConsulta" data-target="#fechaconsulta"
		value='{{ old('FecConsulta', optional($reparar->FecConsulta)->format('d/m/Y')) }}'
		/>
		<div class="input-group-append" data-target="#fechaconsulta" data-toggle="datepicker">
			<div class="input-group-text"><i class="fa fa-calendar"></i></div>
		</div>
		@error('FecConsulta')
				<span class="text-danger ">{{ $message }}</span>
		@enderror	

	</div>
	
</div>



@section('js')

<script type="text/javascript">

		
//console.log('hola');

        $(".ComboBox").select2({
           theme: "classic"
        });	


		
//      });
</script>        

<script type="text/javascript">


var date = new Date();
 var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
	
/* 
 $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };

    $.datepicker.setDefaults($.datepicker.regional['es']);
*/
	   $(
		'#FecEntrada,#FecCompra,#FecConsulta'
		).datepicker(
	   {
		format: 'dd/mm/yyyy',
		language: 'es'
       })

	   //$('#fechaconsulta').datepicker('setDate', today);
	   
		   
//})


//value="{{ old('FecEntrada', $reparar->FecEntrada) }}"
/*
	   function FueraZona_OnChange(target) 
	   {
		var textInput = target.closest('tr').getElementById('FueraZona');
			if (target.checked) {
				textInput.value = "S";
			} else {
				textInput.value = "N";
			}
	   }
*/
	   function updateCheckboxValue(checkbox) {
            checkbox.value = checkbox.checked ? "S" : "N";
        }
</script>        

@stop
