@php
    echo "<?php".PHP_EOL;
@endphp

namespace {{ $config->namespaces->dataTables }};

use {{ $config->namespaces->model }}\{{ $config->modelNames->name }};
@if($config->options->localized)
use Yajra\DataTables\Html\Column;
@endif
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class {{ $config->modelNames->name }}DataTable extends DataTable
{
    /**
     * Build DataTable class.
     */
    public function dataTable(mixed $query): \Yajra\DataTables\DataTableAbstract
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', '{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     */
    public function query({{ $config->modelNames->name }} $model): \Illuminate\Database\Eloquent\Builder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html(): \Yajra\DataTables\Html\Builder
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    // Enable Buttons as per your need
//                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
@if($config->options->localized)
                'language' => [
                    'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                ],
@endif
            ]);
    }

    /**
     * Get columns.
     */
    protected function getColumns(): array
    {
        return [
            {!! $columns !!}
        ];
    }

    /**
     * Get filename for export.
     */
    protected function filename(): string
    {
        return '{{ $config->modelNames->snakePlural }}_datatable_' . time();
    }
}
