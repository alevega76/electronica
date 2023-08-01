<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Kayros Electronica') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        
                <!-- Font Awesome -->
        <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

      
     
        
	 <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

  <!-- Preloader 
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  -->
  <!-- Navbar -->
  @include('layouts.navigation')
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    @yield('header')
    <!-- Content Header (Page header) 
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    -->
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
            @yield('content')
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 1997-2023 <a href="https://adminlte.io">Multisoft Computer Services</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



                <!-- jQuery -->
        <script src="/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

        <!-- overlayScrollbars -->
        <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/dist/js/adminlte.js"></script>
        <!-- AdminLTE for demo purposes -->

        <script src="/dist/js/adminlte.js"></script>

        

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

</body>

    
  
</html>
