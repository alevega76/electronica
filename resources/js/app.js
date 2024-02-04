import './bootstrap';
import 'laravel-datatables-vite';
import '../css/admin_custom.css';

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist'

import swal from 'sweetalert2';
import toastr from 'toastr';
import responsive from 'datatables.net-responsive-bs5';


window.responsive = responsive;
window.toastr =  toastr;
window.toastr.options = {
    "progressBar": true
  };
window.Alpine = Alpine;
Alpine.plugin(persist)
window.swal = swal;
Alpine.start();
