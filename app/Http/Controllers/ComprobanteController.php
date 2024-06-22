<?php

namespace App\Http\Controllers;


use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tecnico;
use App\Models\Marca;
use App\Models\Aparato;
use App\Models\Empresa;
use App\Models\Departamento;
//use App\Models\Provincia;
use App\Models\Reparar;
use App\Models\Talonario;
use App\Http\Requests\RepararUpdateRequest;
use App\Http\Requests\RepararCreateRequest;
use App\DataTables\repararDataTable;
use JeroenNoten\LaravelAdminLte\View\Components\Tool\Datatable;
use Yajra\DataTables\EloquentDataTable;
use PDF; // Importar el alias para dompdf
//Barryvdh\DomPDF
class ComprobanteController extends Controller
{
    public function show($id)
    {
        $comprobante = Reparar::findOrFail($id);

       // dd($comprobante);
        return view('comprobante.show', compact('comprobante'));
    }

    public function downloadPDF($id)
    {
        $comprobante = Reparar::findOrFail($id);

   
        
        $pdf = PDF::loadView('comprobante.show', compact('comprobante'));
        
        return $pdf->download('comprobante.pdf');

        
        //return view('comprobante.pdf', compact('comprobante'));
    }
}