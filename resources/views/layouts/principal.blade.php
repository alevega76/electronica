<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
 

<x-app-layout>
  	
<div class="container-fluid" >
    <div class="wrapper" >
    @include('layouts.navigation')
          <!-- Preloader 
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div>
    -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
       <!-- Main content -->
          <div id="page-wrapper">
                  @yield('content')
          </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      

        <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
      </aside>
        <!-- /.control-sidebar -->
    

     
        
</div>
<!-- ./wrapper -->


</x-app-layout>