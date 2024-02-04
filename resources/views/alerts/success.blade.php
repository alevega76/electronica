

@if(Session::has('message'))

<!-- 
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong> {{Session::get('message')}} </strong> You should check in on some of those fields below.
</div>
-->



<script type="text/javascript">   



document.addEventListener('DOMContentLoaded', function () {
  
  console.log("toastr",toastr);
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

toastr.success(" {{ Session::get('message') }} ");

/*
swal.fire({
  position: 'top-end',
  icon: 'success',
  title: " {{ Session::get('message') }} ",
  showConfirmButton: false,
  timer: 1500
});
*/

});

</script>


@endif


