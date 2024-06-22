<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class RepararUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    
    protected function prepareForValidation()
    {
        if ($this->FecEntrada) {
            $this->merge([
                'FecEntrada' => Carbon::createFromFormat('d/m/Y', $this->FecEntrada)->format('Y-m-d'),
            ]);
        }

        if ($this->FecCompra) {
            $this->merge([
                'FecCompra' => Carbon::createFromFormat('d/m/Y', $this->FecCompra)->format('Y-m-d'),
            ]);
        }

        if ($this->FecConsulta) {
            $this->merge([
                'FecConsulta' => Carbon::createFromFormat('d/m/Y', $this->FecConsulta)->format('Y-m-d'),
            ]);
        }

        if ($this->FecOk) {
            $this->merge([
                'FecOk' => Carbon::createFromFormat('d/m/Y', $this->FecOk)->format('Y-m-d'),
            ]);
        }

        if ($this->FecSalida) {
            $this->merge([
                'FecSalida' => Carbon::createFromFormat('d/m/Y', $this->FecSalida)->format('Y-m-d'),
            ]);
        }
      
     
        

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'FecEntrada' => 'date|date_format:Y-m-d',
            'CodEmpresa' => 'numeric',
            'ClientEmpresa' => 'required|max:50',
            'Localidad' => 'numeric',
            'Domicilio' => 'string|max:50',
            'Telefono' => 'string|max:50',
            'CodEmpresa' => 'numeric',
            'FecCompra' => 'date|date_format:Y-m-d',
            'NroFactura' => 'string|max:50',
            'CodAparato' => 'numeric',
            'Modelo' => 'string|max:50',
            'CodMarca' => 'numeric',
            'NroSerie' => 'string|max:50',
            'Accesorios' => 'string|max:2000',
            'Observaciones' => 'string|max:2000',
            'Intervencion' => 'nullable|string|max:2000',
            'CodInterv' => 'nullable|numeric',
            'CodOpcion' => 'string|max:1',
            'FueraZona' => 'string',
            'Garantia' => 'string',
            'FecConsulta' => 'date|date_format:Y-m-d',
            'FecOk' => 'nullable|date|date_format:Y-m-d',
            'FecSalida' => 'nullable|date|date_format:Y-m-d',
            'EmpresaVendedora' => 'numeric',
            'Notas' => 'nullable|string|max:2000',
            'ImporteCotiz' => 'numeric'

        ];
    }
}
