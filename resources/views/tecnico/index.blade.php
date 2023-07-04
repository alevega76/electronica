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
							<table class="table table-bordered table-sm" >
							<thead>	
								<th>Cod. Tecnico</th>
								<th>Nombre y Apellido</th>
								<th>Operacion</th>
							</thead>
								@foreach($tecnicos as $tecnico)
								<tbody>
									<td >{{$tecnico->CodTecnico}}</td>
									<td >{{$tecnico->NomTecnico}}</td>
									<td> 
									<div class="row">
											<div class="col-sm-2"> 
												<a class="btn btn-success btn-sm"  href="{{ route('tecnico.edit',$tecnico) }}">
													Edit
												</a>
											</div>												
											<div class="col-sm-2"> 
											<form action="{{ route('tecnico.destroy',$tecnico) }}" method="POST">
												@csrf
												@method('DELETE')
												<button id="outside" class="btn btn-danger btn-sm"  type="submit">Delete</button>
											</form>
											</div>												
										</div>										
									</td>
								</tbody>
								@endforeach
							</table>
							<div class="mt-2">
								{!!$tecnicos->render()!!}
							</div>
						</div>
						<div class="card-footer">
							  <a class="btn btn-primary" href="{{ route('tecnico.create') }}">Agregar Tecnico</a>
                		</div>
						<!-- /.card-body -->
				</div>
	
	

	

@endsection

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function () {
   swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
});
</script>
