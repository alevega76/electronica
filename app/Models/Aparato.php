<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aparato extends Model
{
    use HasFactory;

    protected $primaryKey = 'idAparato';
	//public $timestamps = false;
	//protected $table = "solicitud";
	public $timestamps = false ; 
	protected $table = "aparatos";
	protected $guarded = array("*");
	protected $fillable = array("CodAparato","NomAparato"); //,"created_at","updated_at"

	public function Reparar()
    {
        return $this->belongsTo(Reparar::class, 'CodAparato', 'CodAparato');
    }
}
