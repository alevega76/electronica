<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $primaryKey = 'idEmpresa';
	//public $timestamps = false;
	//protected $table = "solicitud";
	public $timestamps = false ; 
	protected $table = "empresas";
	protected $guarded = array("*");
	protected $fillable = array("CodEmpresa","NomEmpresa"); //,"created_at","updated_at"
}
