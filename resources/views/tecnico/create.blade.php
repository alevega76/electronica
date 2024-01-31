@extends('adminlte::page')


	@section('content')

		
		@section('header')
        <div class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                 <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Tecnicos
                  </h2>
            </div>
        </div>
    	@endsection

	

		<form method="POST" action="{{ route('tecnico.store',$tecnico) }}">
		    @csrf 
			<div class="d-flex align-items-center mt-5"  >
				<div class="card card-primary mx-auto w-50">
						<div class="card-header">
							<h3 class="card-title">Agregar Tecnico</h3>
						</div>
						<div class="card-body">
							

								@include('Tecnico.forms.usr')

						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Grabar</button>
						</div>
				</div>
			</div>			 
            <!-- /.card -->		
		   </div>			 
		</form>	
	@endsection
