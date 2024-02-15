<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tecnico;
use App\Models\Marca;
use App\Models\Aparato;
use App\Models\Empresa;
use App\Models\Departamento;
//use App\Models\Provincia;
use App\Models\Reparar;

class RepararController extends Controller
{
    public function index()
    {

        $dataSQLServer = DB::connection('sqlsrv')->table('ELEC_TECNICOS')->get();
        $dataArray = $dataSQLServer->toArray();
        dd($dataArray);

        return response()->json($dataSQLServer);
    }

    public function ImportData()
    {

        $dataTecnicos = DB::connection('sqlsrv')->table('ELEC_TECNICOS')->get();
        $dataArrayTecnicos = $dataTecnicos->toArray();
      
        DB::connection('mysql')->table('tecnicos')->truncate();
        foreach ($dataArrayTecnicos as $item) {
            $tecnico = new tecnico();
            $tecnico->CodTecnico = $item->Cod_Tecnico;
            $tecnico->NomTecnico = $item->Nom_Tecnico;
            $tecnico->save();
        }

        $dataMarcas = DB::connection('sqlsrv')->table('ELEC_MARCAS')->get();
        $dataArrayMarcas = $dataMarcas->toArray();
        DB::connection('mysql')->table('marcas')->truncate();
        foreach ($dataArrayMarcas as $item) {
            $marca = new Marca();
            $marca->CodMarca = $item->Cod_Marcas;
            $marca->NomMarca = $item->Nombre_Marcas;
            $marca->save();
        }

        $dataAparatos = DB::connection('sqlsrv')->table('ELEC_APARATOS')->get();
        $dataArrayAparatos = $dataAparatos->toArray();
        DB::connection('mysql')->table('aparatos')->truncate();
        foreach ($dataArrayAparatos as $item) {
            $marca = new Aparato();
            $marca->CodAparato = $item->Cod_Aparato;
            $marca->NomAparato = $item->Nombre_Aparato;
            $marca->save();
        }

        
        $dataEmpresas = DB::connection('sqlsrv')->table('ELEC_COMERCIOS')->get();
        $dataArrayEmpresas = $dataEmpresas->toArray();
        DB::connection('mysql')->table('empresas')->truncate();
        foreach ($dataArrayEmpresas as $item) {
            $Empresa = new Empresa();
            $Empresa->CodEmpresa = $item->Cod_Comercio;
            $Empresa->NomEmpresa = $item->Nombre_Comercio;
            $Empresa->Direccion = $item->Direccion;
            $Empresa->save();
        }

        $dataDepartamentos = DB::connection('sqlsrv')->table('ELEC_DEPARTAMENTOS')->get();
        $dataArrayDepart = $dataDepartamentos->toArray();
        DB::connection('mysql')->table('departamentos')->truncate();
        foreach ($dataArrayDepart as $item) {
            $departamento = new Departamento();
            $departamento->CodDepart = $item->Cod_Depart;
            $departamento->NomDepart = $item->Nom_Localidad;
            $departamento->save();
        }

        $dataReparar = DB::connection('sqlsrv')->table('ELEC_SOLSERV')->get();
        $dataArrayReparar = $dataReparar->toArray();
        DB::connection('mysql')->table('reparar')->truncate();
        foreach ($dataArrayReparar as $item) {
            $dataArrayReparar = new Reparar();
            $dataArrayReparar->CodRepar = $item->Cod_Reparacion;
            $dataArrayReparar->FecEntrada = $item->Fe_Entrada;
            $dataArrayReparar->CodEmpresa = $item->Cod_Comercio;
            $dataArrayReparar->ClientEmpresa = $item->Cliente_Comercio;
            $dataArrayReparar->Aparato = $item->Aparato;
            $dataArrayReparar->Marca = $item->Marca;
            $dataArrayReparar->Modelo = $item->Modelo;
            $dataArrayReparar->FecSalida = $item->Fe_Salida;
            $dataArrayReparar->NroSerie = $item->Nro_Serie;
            $dataArrayReparar->Domicilio = $item->Domicilio;
            $dataArrayReparar->Telefono = $item->Telefono;
            $dataArrayReparar->Localidad = $item->Localidad;
            $dataArrayReparar->FecCompra = $item->Fe_Compra;
            $dataArrayReparar->NroFactura = $item->Nro_Factura;
            $dataArrayReparar->EmpresaVendedora = $item->Casa_Vendedora;
            $dataArrayReparar->CodOpcion = $item->Cod_Opcion;
            $dataArrayReparar->FueraZona = $item->Fuera_Zona;
            $dataArrayReparar->Garantia = $item->Garantia;
            $dataArrayReparar->Accesorios = $item->Accesorios;
            $dataArrayReparar->Observaciones = $item->Observaciones;
            $dataArrayReparar->ImporteCotiz = $item->Presupuesto;
            $dataArrayReparar->Intervencion = $item->Intervencion;
            $dataArrayReparar->FecOk = $item->Fe_Ok;
            $dataArrayReparar->CodInterv = $item->Cod_Interv;
            $dataArrayReparar->FecConsulta = $item->Fe_Consulta;
            $dataArrayReparar->Notas = $item->Notas;
            $dataArrayReparar->CodTecnico = $item->Cod_Tecnico;
            $dataArrayReparar->CodSolicitud = $item->Cod_Solicitud;
            //IdSolServ

            $dataArrayReparar->save();
        }

        /*
        $dataProvin = DB::connection('sqlsrv')->table('ELEC_PROVINCIAS')->get();
        $dataArrayProvin = $dataProvin->toArray();
        DB::connection('mysql')->table('provincias')->truncate();
        foreach ($dataArrayDepart as $item) {
            $departamento = new Provincia();
            $departamento->CodDepart = $item->Cod_Depart;
            $departamento->NomDepart = $item->Nom_Localidad;
            $departamento->save();
        }
        */

        // genere el backup con el sql 2008 y puede restaurar en el remoto sin problema de version
        // tal vez alla que actualizar el sql server de augusto :-) 
        // De todos modos la idea es hacerlo debes en cuando...creoo hasta que la app este lista
        // Hay que seguir realizando la exportacion como en la tabla de tecnicos mas arriba


        return "Proceso terminado";
    }

}
