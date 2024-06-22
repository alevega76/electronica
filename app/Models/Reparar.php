<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparar extends Model
{
    use HasFactory;


    protected $primaryKey = 'idRepar';
	//public $timestamps = false;
	//protected $table = "solicitud";
	public $timestamps = false ; 
	protected $table = "reparar";
	protected $guarded = array("*");
	
	protected $fillable = array(
		'CodRepar',
		'FecEntrada',
		'CodEmpresa',
		'ClientEmpresa',
		'Localidad',
		'Domicilio',
		'Telefono',
		'CodEmpresa',
		'FecCompra',
		'NroFactura',
		'CodAparato',
		'Modelo',
		'CodMarca',
		'NroSerie',
		'Accesorios',
		'Observaciones',
		'Intervencion',
		'CodInterv',
		'CodOpcion',
		'FueraZona',
		'Garantia',
		'FecConsulta',
		'FecOk',
		'FecSalida',
		'EmpresaVendedora',
		'Notas',
		'ImporteCotiz'


	); //,"created_at","updated_at"

	
	protected $casts = [
		'FecEntrada' => 'datetime',
		'FecCompra'=> 'datetime',
		'FecSalida'=> 'datetime',
		'FecOk'=> 'datetime',
		'FecConsulta'=> 'datetime'
		//'commission_amount' => 'decimal:4'
	];
	
	public function Tecnico()
    {
        
		return $this->hasOne(Tecnico::class, 'CodTecnico', 'CodTecnico');
    }
   
	public function Aparato()
    {
        
		return $this->hasOne(Aparato::class, 'CodAparato', 'CodAparato');
    }
	
	public function Marca()
    {
        
		return $this->hasOne(Marca::class, 'CodMarca', 'CodMarca');
    }

	public function CasaVendedora()
    {
        
		return $this->hasOne(Empresa::class, 'CodEmpresa', 'EmpresaVendedora');
    }
	
}
