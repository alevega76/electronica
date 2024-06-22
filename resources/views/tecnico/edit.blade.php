@extends('adminlte::page')

@section('content')

		
		@section('header')
        <div class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                 <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Tecnicos
                  </h2>
            </div>
        </div>
    	@endsection

		

		<form method="POST" action="{{ route('tecnico.update',$tecnico) }}">
		    @csrf @method('PATCH')
			<div class="d-flex align-items-center mt-5"  >
				<div class="card card-primary mx-auto w-50">
						<div class="card-header">
							<h3 class="card-title">Editar Tecnico</h3>
						</div>
						<div class="card-body">
							

								@include('tecnico.forms.usr')

						</div>
						<div class="card-footer">
							<div class='d-flex flex-wrap justify-content-between'>
								<button type="button" class="btn btn-primary" onclick="window.location='{{ route('tecnico.index') }}'">Cancelar</button>
								<button type="submit" class="btn btn-primary">Grabar</button>
							</div>
						</div>
				</div>
			</div>			 
            <!-- /.card -->		
		   </div>			 
		</form>	
@endsection


	