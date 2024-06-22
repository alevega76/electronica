<?php

namespace App\DataTables;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmpresasDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        return (new EloquentDataTable($query))
            /*
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->idTecnico.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->idTecnico.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])            
*/

            ->addColumn('action', function($row){
                $actionBtn = '<a  href="/empresas/'. $row->idEmpresa .'/edit" class="btn btn-success btn-sm">Editar</a>';
                $actionBtn = $actionBtn.' <a action="javascript:void(0)" href="#" data-id="'.$row->idEmpresa.'" data-action="" class="btn btn-danger btn-sm" onclick="deleteConfirmation(event);">Borrar</a>';
                //$actionBtn = $actionBtn.' <a href="#" data-id="" data-action="" class="deleteItem btn btn-danger btn-sm" onclick="deleteConfirmation('. $row->idTecnico .')">Delete</a>';
                
                return $actionBtn;
            })
            ->rawColumns(['action'])

            /*    
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm">View</a>';
                $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-danger  btn-sm">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            */
            ->setRowId('idEmpresa');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Empresa $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('empresas-table')
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
                  ->width(60)
                  ->addClass('text-center'),
                  Column::make('idEmpresa'),
                  Column::make('CodEmpresa'),
                  Column::make('NomEmpresa'),            
                 // Column::make('created_at'),
                 // Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'tecnicos_' . date('YmdHis');
    }
}