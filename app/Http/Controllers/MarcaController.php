<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Marca;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Requests\MarcaUpdateRequest;
use App\Http\Requests\MarcaCreateRequest;
use App\DataTables\marcasDataTable;

class MarcaController extends Controller
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

    public function index(marcasDataTable $dataTable)
    {
       return $dataTable->render('marca.index');
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
        $marca = new marca();
        $operation = false;
        return view('marca.create',['marca'=>$marca,'operation'=>$operation]);
    }

    //public function store(Request $request)
    public function store(MarcaCreateRequest $request)
    {
     
        marca::create($request->validated());
        Session::flash('message','marca creado correctamente') ; 
        return to_route('marca.index')->with('status', 'marca created!');

    }

    public function show($id)
    {
    	
    }

    

  public function edit(Marca $marca)
  {
    
    //$tecnico = tecnico::find($id);
    $operation = true;      
    return view('marca.edit',['marca'=>$marca,'operation'=>$operation]);
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
   public function update(MarcaUpdateRequest $request, Marca $marca)
   {
   // \Log::info($request->all());
       $marca->update($request->validated());

       Session::flash('message','marca actualizado correctamente') ; 
       return to_route('marca.index')->with('status', 'marca updated!');
   }

    public function destroy(Request $request,Marca $marca)
    {
      //dd($request);      
      $request->marca->delete(); 
      //\Log::info($request->all());

      return response()->json([
        'success' => 'marca eliminado correctamente' 
      ]);
    }

    
}
