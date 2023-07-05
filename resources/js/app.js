import './bootstrap';
import 'laravel-datatables-vite';


import Alpine from 'alpinejs';

import swal from 'sweetalert2';
import toastr from 'toastr';

window.toastr = toastr;
window.toastr.options = {
    "progressBar": true
  };
window.Alpine = Alpine;
window.swal = swal;
Alpine.start();
