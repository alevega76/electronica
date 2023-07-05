@extends('layouts.app')

@section('content')




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

	@include('alerts.success')



				<div class="card card-primary m-5"  style="width: 50rem;" >
						<div class="card-header">
							<h3 class="card-title">Listado de Tecnicos</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
						{{ $dataTable->table() }}
						{{ $dataTable->scripts() }}
						</div>
						<div class="card-footer">
							  <a class="btn btn-primary" href="{{ route('tecnico.create') }}">Agregar Tecnico</a>
                		</div>
						<!-- /.card-body -->
				</div>
	
	

	

@endsection

