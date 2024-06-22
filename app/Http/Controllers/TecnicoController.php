<?php

namespace App\Http\Controllers;


use Session;
use App\Models\Tecnico;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Requests\TecnicoUpdateRequest;
use App\Http\Requests\TecnicoCreateRequest;
use App\DataTables\tecnicosDataTable;

class TecnicoController extends Controller
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

	
    public function index(tecnicosDataTable $dataTable)
    {
       return $dataTable->render('tecnico.index');
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
        $tecnico = new tecnico();
        $operation = false;
        return view('tecnico.create',['tecnico'=>$tecnico,'operation'=>$operation]);
    }

    //public function store(Request $request)
    public function store(TecnicoCreateRequest $request)
    {
        //dd($request);
        tecnico::create($request->validated());
        Session::flash('message','tecnico creado correctamente') ; 
        return to_route('tecnico.index')->with('status', 'tecnico created!');

    }

    public function show($id)
    {
    	
    }

    

  public function edit(Tecnico $tecnico)
  {
    
    //$tecnico = tecnico::find($id);
    $operation = true;      
    return view('tecnico.edit',['tecnico'=>$tecnico,'operation'=>$operation]);
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
   public function update(TecnicoUpdateRequest $request, Tecnico $tecnico)
   {
       $tecnico->update($request->validated());

       Session::flash('message','tecnico actualizado correctamente') ; 
       return to_route('tecnico.index')->with('status', 'tecnico updated!');
   }

    public function destroy(Request $request ,Tecnico $tecnico)
    {
      //  dd($tecnico);
       //tecnico::destroy($tecnico);
       
      $request->tecnico->delete(); 
      //Session::flash('message','tecnico eliminado correctamente') ; 

      
     //return to_route('tecnico.index')->with('status', 'tecnico delete!');
     return response()->json([
        'success' => 'tecnico eliminado correctamente'
    ]);
    }

    
}
