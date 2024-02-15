<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparar extends Model
{
    use HasFactory;

    protected $primaryKey = 'idReparar';
	//public $timestamps = false;
	//protected $table = "solicitud";
	public $timestamps = false ; 
	protected $table = "reparar";
	protected $guarded = array("*");
	//protected $fillable = array("CodAparato","NomAparato"); //,"created_at","updated_at"
}
