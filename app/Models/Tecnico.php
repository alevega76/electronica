<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    use HasFactory;

    protected $primaryKey = 'idTecnico';
	//public $timestamps = false;
	//protected $table = "solicitud";
	public $timestamps = false ; 
	protected $table = "tecnicos";
	protected $guarded = array("*");
	protected $fillable = array("CodTecnico","NomTecnico"); //,"created_at","updated_at"
}
