<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $primaryKey = 'idDepart';
	//public $timestamps = false;
	//protected $table = "solicitud";
	public $timestamps = false ; 
	protected $table = "departamentos";
	protected $guarded = array("*");
	protected $fillable = array("CodDepart","NomDepart"); //,"created_at","updated_at"
}
