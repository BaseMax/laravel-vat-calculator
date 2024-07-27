<?php

namespace App\DataTables;

use App\Enums\RequestType;
use App\Models\Request;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RequestDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('operation', function (Request $request) {
                return $request->typeToString();
            })
            ->editColumn('currency', function (Request $request) {
                return $request->currency->name;
            })
            ->editColumn('vat', function (Request $request) {
                return $request->vat.'%';
            })
            ->editColumn('amount', function (Request $request) {
                return $request->amount.' '.$request->currency->name;
            })
            ->addColumn('action', 'requests.actions')
            ->orderColumn('operation', function ($query, $orderDirection) {
                $query->orderByRaw("FIELD(type, '".implode("','", RequestType::possibleValues())."') $orderDirection");
            })
            ->orderColumn('currency', function ($query, $orderDirection) {
                $query->join('currencies', 'requests.currency_id', '=', 'currencies.id')
                    ->orderBy('currencies.name', $orderDirection);
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Request $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('requests-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive()
            ->autoWidth(false)
            ->lengthMenu([10, 25, 50, 100, 200, 500])
            ->responsiveDetails(true)
            ->orderBy(0, 'desc');
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title('ID'),
            Column::make('amount')->title('Amount'),
            Column::make('vat')->title('VAT'),
            Column::make('operation')->title('Operation'),
            Column::make('currency')->title('Currency'),
            Column::make('action')->width('50px')->title('Action'),
        ];
    }
}
