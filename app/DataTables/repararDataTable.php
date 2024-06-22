<?php

namespace App\DataTables;

use App\Models\Reparar;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class repararDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $query = Reparar::with(
        'tecnico',
        'aparato'
        )->select('reparar.*')->orderBy('reparar.CodRepar', 'DESC');

        return (new EloquentDataTable($query))
            /*
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->idTecnico.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->idTecnico.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])            
            */
            
            ->addColumn('Tecnico_descripcion', function ($reparar) {
                return $reparar->Tecnico ? $reparar->Tecnico->NomTecnico : 'Sin tecnico asignado';
            })->rawColumns(['Tecnico_descripcion'])
        
            ->addColumn('Aparato_descripcion', function ($reparar) {
                return $reparar->Aparato ? $reparar->Aparato->NomAparato : 'Aparato No asignado';
            })->rawColumns(['Aparato_descripcion'])

            ->addColumn('Marca_descripcion', function ($reparar) {
                return $reparar->Marca ? $reparar->Marca->NomMarca : 'Marca No asignado';
            })->rawColumns(['Marca_descripcion'])

            
            ->addColumn('action', function($row){
                $actionBtn = '<a action="javascript:void(0)" href="#" data-id="'.$row->idRepar.'" data-action="" class="btn btn-danger btn-sm" onclick="deleteConfirmation(event);"><i class="far fa-trash-alt"></i></a>';
                //$actionBtn = $actionBtn.' <a href="#" data-id="" data-action="" class="deleteItem btn btn-danger btn-sm" onclick="deleteConfirmation('. $row->idTecnico .')">Delete</a>';
                //$actionBtn = $actionBtn.'<a  href="/comprobante/'. $row->idRepar .'/show" class="btn btn-success btn-sm">Imprimir</a>';
                return $actionBtn;
            })
            ->addColumn('ImpCompr', function($row){
                $actionBtn = '<a href="/comprobante/'. $row->idRepar .'/show" class="btn btn-primary btn-sm "><i class="fa fa-print"></i></a>';
                $actionBtn = $actionBtn. '  <a href="/reparar/'. $row->idRepar .'/edit" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['action','ImpCompr'])

            /*    
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm">View</a>';
                $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-danger  btn-sm">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            */
            ->setRowId('idRepar');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Reparar $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('reparar-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
                  Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center'),
                  Column::make('idRepar'),
                  Column::make('CodRepar'),
                  Column::make('ClientEmpresa'),
                  Column::make('NomTecnico'),
                  Column::make('NomAparato')

                  
                 // Column::make('created_at'),
                 // Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'solicitudes_' . date('YmdHis');
    }
}
