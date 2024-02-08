<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tecnico;
class RepararController extends Controller
{
    public function index()
    {
        $dataSQLServer = DB::connection('sqlsrv')->table('ELEC_TECNICOS')->get();

        $dataArray = $dataSQLServer->toArray();
        dd($dataArray);

        $tecnico = new tecnico();

        return response()->json($dataSQLServer);
    }
}
