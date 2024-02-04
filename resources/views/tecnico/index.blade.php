
@extends('adminlte::page')

@section('content_header')
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
@stop



@section('content')




@section('content')
	
	  @section('header')
        <div class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                 <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Tecnicos
                  </h2>
            </div>
        </div>
            <!-- Scripts -->
        
    @endsection

	
        @include('alerts.success')


				<div class="card card-primary m-5"  style="width: 50rem;" >
						<div class="card-header">
							<h3 class="card-title">Listado de Tecnicos</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">

						{{--
							{{ $dataTable->table() }}
							{{ $dataTable->scripts() }}
						--}}
					
				<table id="data-table" class="display nowrap table table-bordered data-table" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>idTecnico</th>
									<th>CodTecnico</th>
									<th>NomTecnico</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
				</table>

						
						</div>
						<div class="card-footer">
							  <a class="btn btn-primary" href="{{ route('tecnico.create') }}">Agregar Tecnico</a>
                		</div>
						<!-- /.card-body -->
				</div>
				
				



	
				<form id="delete_form" method="POST">
					@csrf
					@method('DELETE')
				</form>


				


@endsection




@section('js')
    
<script type="text/javascript">

    function deleteConfirmation(e) {
      console.log(e);
               // e.preventDefault();
                var url =  '{{ route("tecnico.destroy", ":id") }}';
                console.log(e.target.dataset.id);
                var id =  e.target.dataset.id ;//$(e).data('id');
                url = url.replace(':id', id);
                console.log("url ", url);
                swal.fire({
                    title: "Delete?",
                    text: "Please ensure and then confirm!",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: !0
                }).then(function (result) {
                    if (result.isConfirmed) {
                      console.log("paso");
                     // $('#delete_form').attr('action', url);
                    //  $('#delete_form').submit();
                      
                        console.log(id);
                        const url2 = $(this).attr('href');
                        var url =  '{{ route("tecnico.destroy", ":id") }}';
                        url = url.replace(':id', id);
                        console.log(url);
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        console.log(CSRF_TOKEN);
                        $.ajax({
                            type: 'POST',
                            Method: "DELETE",
                            url: url,
                            data: {_token: CSRF_TOKEN,_method: "delete"},
                            dataType: 'JSON',
                            success: function (results) {
                              //location.href = location.href;
                              var oTable = $('#data-table').dataTable();
                                        oTable.fnDraw(false);
                              console.log(results.success);
                              
                              
                              toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": true,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": true,
                              "onclick": null,
                              //"showDuration": "1000",
                              //"hideDuration": "500",
                              "timeOut": "1000",
                              //"extendedTimeOut": "100",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            }
    
                            toastr.success(results.success);
    
                                if (results.success === true) {
                                    //swal.fire("Done!", results.message, "success");
                                } else {
                                   // swal.fire("Error!", results.message, "error");
                                }
                                
                            }
                        });
                        
                    } else {
                        e.dismiss;
                    }
                }, function (dismiss) {
                    return false;
                })
    }
    
    $('.show_confirm').click(function(event) {
              console.log("delete");
              var form =  $(this).closest("form");
              var name = $(this).data("name");
              event.preventDefault();
              swal.fire({
                title: 'Desea eliminar . Confirme ?',
                text: 'luego de eliminar no se podra revertir',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar'
              })
              .then((result) => {
                if (result.isConfirmed) {
                   form.submit();
                }
              });
    });
    
    
    
    document.addEventListener('DOMContentLoaded', function () {
    /*
      swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
      });
      */
      /*
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
    */
    
    });
    
    </script>
    
    <script type="text/javascript">
    $(document).ready(function() {
      
      var xtable =  new DataTable('#example', {
        responsive: true
    });
    
      $('.users-table').DataTable( {
        responsive: true
      
      });
    });
    </script>	
    
    <script type="text/javascript">
    $(document).ready(function() {
      
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            /*
            responsive: {
             details: true
            },
            autoWidth: false,
            */
            ajax: "{{ route('tecnico.index') }}",
            columns: [
                {data: 'idTecnico', name: 'idTecnico'},
                {data: 'CodTecnico', name: 'CodTecnico'},
                {data: 'NomTecnico', name: 'NomTecnico'},
              //  {data: 'created_at', name: 'created_at'},
              //  {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        
      });
    </script>	

@stop