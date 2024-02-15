<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $primaryKey = 'idMarca';
	//public $timestamps = false;
	//protected $table = "solicitud";
	public $timestamps = false ; 
	protected $table = "marcas";
	protected $guarded = array("*");
	protected $fillable = array("CodMarca","NomMarca"); //,"created_at","updated_at"
}
