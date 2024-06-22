<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talonario extends Model
{
    use HasFactory;

    protected $primaryKey = 'idTalonario';
	//public $timestamps = false;
	//protected $table = "solicitud";
	public $timestamps = false ; 
	protected $table = "talonarios";
	protected $guarded = array("*");
	//protected $fillable = array("NroTalonario","Descripcion"); //,"created_at","updated_at"
}
