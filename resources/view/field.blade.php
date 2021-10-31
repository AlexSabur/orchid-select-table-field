@component($typeForm, get_defined_vars())
<div data-controller="select-table">
    Выбранно элементов.
    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#{{ $id }}-modal">
        Выбрать
    </button>

    @if($mode === 'select')
    <select class="d-none" name="{{ $name }}" multiple hidden>
        @foreach($value as $v)
        <option value="{{ $v }}" selected>{{ $v }}</option>
        @endforeach
    </select>
    @else
    <input type="hidden" name="{{ $name }}" value="{{ $value }}">
    @endif

    <div class="modal fade" id="{{ $id }}-modal" tabindex="-1" aria-labelledby="{{ $id }}-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $id }}-modal-label">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <turbo-frame id="{{ $id }}-frame" src="{{ route('platform.systems.select-table, ['data' => $data, 'columns' => 'columns']') }}" loading="lazy"></turbo-frame>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endcomponent