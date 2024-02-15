<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $primaryKey = 'idProvin';
	//public $timestamps = false;
	//protected $table = "solicitud";
	public $timestamps = false ; 
	protected $table = "provincias";
	protected $guarded = array("*");
	protected $fillable = array("CodProvin","NomProvin"); //,"created_at","updated_at"
}
