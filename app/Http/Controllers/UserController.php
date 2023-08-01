<?php
namespace App\Http\Controllers;

use Session;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
//use App\Http\Requests\TecnicoUpdateRequest;
//use App\Http\Requests\TecnicoCreateRequest;
use App\DataTables\usersDataTable;

class UserController extends Controller
{
    public function index(usersDataTable $dataTable)
    {
       return $dataTable->render('user.index');
    }
    //
}
