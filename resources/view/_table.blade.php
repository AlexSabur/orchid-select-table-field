<div class="bg-white">
    <div class="table-responsive">
        <table @class(['table', 'table-hover'])>
            <thead>
                <tr>
                    <td>
                        
                    </td>
                    @foreach($columns as $column)
                        {!! $column->buildTh() !!}
                    @endforeach
                </tr>
            </thead>
            <tbody>

            @foreach($rows as $source)
                <tr data-select-table-target="row">
                    <td>
                        <div class="d-flex justify-content-center">
                            <input type="checkbox" class="form-check-input data-select-table-target="check">
                        </div>
                    </td>
                    @foreach($columns as $column)
                        {!! $column->buildTd($source) !!}
                    @endforeach
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    @includeWhen(($rows instanceof \Illuminate\Contracts\Pagination\Paginator || $rows instanceof \Illuminate\Contracts\Pagination\CursorPaginator) && $rows->isNotEmpty(),
        'platform::layouts.pagination',[
            'paginator' => $rows,
            'columns' => $columns,
            'onEachSide' => $onEachSide,
        ])
</div>