<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Empresa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Requests\EmpresaUpdateRequest;
use App\Http\Requests\EmpresaCreateRequest;
use App\DataTables\EmpresasDataTable;

class EmpresaController extends Controller
{
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

    public function index(EmpresasDataTable $dataTable)
    {
       return $dataTable->render('empresa.index');
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
        $empresa = new Empresa();
        $operation = false;
        return view('empresa.create',['empresa'=>$empresa,'operation'=>$operation]);
    }

    //public function store(Request $request)
    public function store(EmpresaCreateRequest $request)
    {
     
        Empresa::create($request->validated());
        Session::flash('message','empresa creado correctamente') ; 
        return to_route('empresa.index')->with('status', 'empresa creado');

    }

    public function show($id)
    {
    	
    }

    

  public function edit(Empresa $empresa)
  {
    
    //$tecnico = tecnico::find($id);
    $operation = true;      
    return view('empresa.edit',['empresa'=>$empresa,'operation'=>$operation]);
    //return view('Tecnico.edit');

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
   public function update(EmpresaUpdateRequest $request, Empresa $empresa)
   {
   // \Log::info($request->all());
       $empresa->update($request->validated());

       Session::flash('message','empresa actualizado correctamente') ; 
       return to_route('empresa.index')->with('status', 'empresa actualizado');
   }

    public function destroy(Request $request,Empresa $empresa)
    {
      //dd($request);      
      $request->empresa->delete(); 
      //\Log::info($request->all());

      return response()->json([
        'success' => 'empresa eliminado correctamente' 
      ]);
    }

    
}
