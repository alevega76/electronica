import './bootstrap';
//import 'bootstrap/dist/css/bootstrap.min.css';

import 'laravel-datatables-vite';
import '../css/admin_custom.css';

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist'

import swal from 'sweetalert2';
import toastr from 'toastr';
import responsive from 'datatables.net-responsive-bs5';
import moment from 'moment';
//import 'datatables.net-plugins';
//import 'datatables.net-plugins/dataRender/datetime.mjs';

//import jQuery from 'jquery';


//import select2 from 'select2';
//select2();

//window.$ = jQuery;
//window.select2 = select2;

// Chart JS
//import Chart from 'chart.js/auto';
//window.Chart = Chart;

window.moment = moment;
import daterangepicker from 'daterangepicker';
window.daterangepicker = daterangepicker;

window.responsive = responsive;
window.toastr =  toastr;
window.toastr.options = {
    "progressBar": true
  };
window.Alpine = Alpine;
Alpine.plugin(persist)
window.swal = swal;
Alpine.start();
