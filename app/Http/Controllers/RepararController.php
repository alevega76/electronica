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

class RepararController extends Controller
{
    /*
    public function index()
    {
        //NO BORRAR ES PARA LA IMPORTACION DE DATOS DESDE SQL SERVER    
        $dataSQLServer = DB::connection('sqlsrv')->table('ELEC_TECNICOS')->get();
        $dataArray = $dataSQLServer->toArray();
        dd($dataArray);

        return response()->json($dataSQLServer);
    }
    */

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
            $aparato = new Aparato();
            $aparato->CodAparato = $item->Cod_Aparato;
            $aparato->NomAparato = $item->Nombre_Aparato;
            $aparato->save();
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
        /*
        $dataTalonarios = DB::connection('sqlsrv')->table('ELEC_TALONARIOS')->get();
        $dataArrayTalonarios = $dataTalonarios->toArray();
        DB::connection('mysql')->table('talonarios')->truncate();

        foreach ($dataArrayTalonarios as $item) {
            $talonario = new Talonario();
            $talonario->NroTalonario = $item->Num_Talonario;
            $talonario->Descripcion = $item->Descripcion;
            $talonario->Tipo = $item->Tipo_Asociado;
            $talonario->Sucursal = $item->Sucursal_Asociada;
            //$talonario->DestImpr = $item->Comprobante;
            $talonario->DestImpr = $item->Destino_Impresion;
            $talonario->CantMaxItera = $item->Cantidad_Max_itera;
            $talonario->PriNumHab = $item->Primer_Num_Habilitado;
            $talonario->UltNumHab = $item->Ultimo_Num_Habilitado;
            $talonario->ProxEmitir = $item->Proximo_Emitir;
            $talonario->save();
        }
            */
        $dataReparar = DB::connection('sqlsrv')->table('ELEC_SOLSERV')->get();
        $dataArrayReparar = $dataReparar->toArray();
        DB::connection('mysql')->table('reparar')->truncate();
        foreach ($dataArrayReparar as $item) {
            $dataArrayReparar = new Reparar();
            $dataArrayReparar->CodRepar = $item->Cod_Reparacion;
            $dataArrayReparar->FecEntrada = $item->Fe_Entrada;
            $dataArrayReparar->CodEmpresa = $item->Cod_Comercio;
            $dataArrayReparar->ClientEmpresa = $item->Cliente_Comercio;
            $dataArrayReparar->CodAparato = $item->Aparato;
            $dataArrayReparar->CodMarca = $item->Marca;
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

     /*
	    Verb        Path 			      Action 		Route Name
		GET        /photo   	          index         photo.index
		GET        /photo/create          create        photo.create
		POST       /photo                 store         photo.store
		GET        /photo/{photo}         show          photo.show
		GET        /photo/{photo}/edit    edit          photo.edit
		PUT/PATCH  /photo/{photo}         update        photo.update
		DELETE     /photo/{photo}         destroy       photo.destroy
	*/



    public function __construct()
    {
        $this->middleware('auth');
    }

	
    public function index(repararDataTable $dataTable)
    {
     //$query = Reparar::with('tecnico','aparato')->select('reparar.*');
        
        //dd($tecnicos);
     //   dd($dataTable->dataTable($query));
       //dd($query->get());
    //   dd($query->get()->toJson());
     //  dd(new EloquentDataTable($query));
       return $dataTable
       //->with('tecnicos', $tecnicos)
       ->render('reparar.index');
    }

    /*
    public function index()
    {
        $tecnicos = tecnico::paginate(10);     
        return view('tecnico.index',compact('tecnicos'));
    }
    */

    // http://127.0.0.1:8000/movie/create
    public function create()
    {
        $tecnicos = Tecnico::all();
        $aparatos = Aparato::all();
        $marcas = Marca::all();
        $empresas =  Empresa::all();
        $departamentos = Departamento::all();

        $reparar = new reparar();
        
        $reparar->FecEntrada = now();
        $reparar->FueraZona = "N";
        $reparar->Garantia = "N";

        /*
        $reparar->FecCompra = now();
        $reparar->FecConsulta = now();
        */
        $reparar->CodRepar = 1;
        //$reparar->ClientEmpresa= "aaaaaaaaaaa";

        $operation = false;
        return view('reparar.create',[
        'reparar'=>$reparar,
        'operation'=>$operation,
        'tecnicos'=>$tecnicos,
        'aparatos'=>$aparatos,
        'marcas' => $marcas,
        'empresas' => $empresas,
        'departamentos' => $departamentos
        ]);
    }

    //public function store(Request $request)
    public function store(RepararCreateRequest $request)
    {
        
        //dd($request);
        $talonario = Talonario::first();
       // dd($talonario);

        $talonario->ProxEmitir = $talonario->ProxEmitir + 1;
        
        $talonario->update();

        //$request->CodRepar =  $talonario->ProxEmitir ;
        //dd($request->ClientEmpresa);
        //$request->input('show', 0)
        $validatedData = $request->validated();

        $validatedData['CodRepar'] = $talonario->ProxEmitir ;
        //dd($validatedData);

        Reparar::create($validatedData);
        Session::flash('message','solicitud creado correctamente') ; 
        return to_route('reparar.index')->with('status', 'solicitud created!');
    }

    public function show($id)
    {
    	// $producto = Reparar::with('tecnico')->findOrFail($id);
       // return view('producto.show', compact('producto'));
    }

    

  public function edit(Reparar $reparar)
  {
    $operation = true;   

    $tecnicos = Tecnico::all();
    $aparatos = Aparato::all();
    $marcas = Marca::all();
    $empresas =  Empresa::all();
    $departamentos = Departamento::all();

    return view('reparar.edit',[
    'reparar'=>$reparar,
    'operation'=>$operation,
    'tecnicos'=>$tecnicos,
    'aparatos'=>$aparatos,
    'marcas' => $marcas,
    'empresas' => $empresas,
    'departamentos' => $departamentos
    ]);
   
   }
/*
public function update(TecnicoUpdateRequest $tecnico)
    {
        //$tecnico = tecnico::find($id);
        
        //$request->tecnico->fill($request->all());
        //$request->tecnico->save() ;

        $tecnico->fill($request->all());
        $tecnico->save() ;

        Session::flash('message','tecnico Editado correctamente') ; 
        return Redirect::to('/Tecnico');

   }
*/
   public function update(RepararUpdateRequest $request, Reparar $reparar)
   {
      //dd($reparar);

       $reparar->update($request->validated());

       Session::flash('message','solicitud actualizado correctamente') ; 
       return to_route('reparar.index')->with('status', 'solicitud updated!');
   }

    public function destroy(Request $request ,Reparar $reparar)
    {
      //  dd($tecnico);
       //tecnico::destroy($tecnico);
       
      $request->reparar->delete(); 
      //Session::flash('message','tecnico eliminado correctamente') ; 

      
     //return to_route('tecnico.index')->with('status', 'tecnico delete!');
     return response()->json([
        'success' => 'solicitud eliminado correctamente'
    ]);
    }

}
