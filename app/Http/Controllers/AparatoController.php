<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Aparato;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Requests\AparatoUpdateRequest;
use App\Http\Requests\AparatoCreateRequest;
use App\DataTables\aparatosDataTable;

class AparatoController extends Controller
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

    public function index(AparatosDataTable $dataTable)
    {
       return $dataTable->render('aparato.index');
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
        $aparato = new Aparato();
        $operation = false;
        return view('aparato.create',['aparato'=>$aparato,'operation'=>$operation]);
    }

    //public function store(Request $request)
    public function store(AparatoCreateRequest $request)
    {
     
        Aparato::create($request->validated());
        Session::flash('message','aparato creado correctamente') ; 
        return to_route('aparato.index')->with('status', 'aparato creado');

    }

    public function show($id)
    {
    	
    }

    

  public function edit(Aparato $aparato)
  {
    
    //$tecnico = tecnico::find($id);
    $operation = true;      
    return view('aparato.edit',['aparato'=>$aparato,'operation'=>$operation]);
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
   public function update(AparatoUpdateRequest $request, Aparato $aparato)
   {
   // \Log::info($request->all());
       $aparato->update($request->validated());

       Session::flash('message','aparato actualizado correctamente') ; 
       return to_route('aparato.index')->with('status', 'aparato actualizado');
   }

    public function destroy(Request $request,Aparato $aparato)
    {
      //dd($request);      
      $request->aparato->delete(); 
      //\Log::info($request->all());

      return response()->json([
        'success' => 'aparato eliminado correctamente' 
      ]);
    }

    
}
