@props(['stats', 'dropdown', 'tools'])

<div class="btn-toolbar card-tools" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group me-2 btn-group-sm" role="group" aria-label="add-button">
        <button wire:click.prevent="create" type="button" class="btn btn-primary " data-bs-toggle="tooltip"
            data-bs-placement="top" title="Add new user">
            <i class="fas fa-plus"></i>
        </button>
    </div>
    <div class="btn-group me-2 btn-group-sm" role="group" aria-label="add-button">
        <div class="input-group input-group-sm d-inline-flex" style="width: 150px;">
            <label for="table_search" class="sr-only">Search</label>
            <input type="text" class="form-control" placeholder="Search" wire:model.debounce.500="search"
                aria-label="Search button" aria-describedby="button-addon1">
            <button class="btn btn-outline-secondary" type="button" id="button-addon1"><i class="fas fa-search"></i>
            </button>
        </div>
    </div>
    @if ($stats)
        <div class="btn-group me-2 btn-group-sm" role="group" aria-label="button stats">
            <button type="button" class="btn btn-tool ">
                <i class="fas fa-download"></i>
            </button>
            <button type="button" class="btn btn-tool ">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    @endif
    @if ($dropdown)
        <div class="btn-group me-2 btn-group-sm" role="group" aria-label="Second group">
            <button type="button" class="btn btn-tool dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-wrench"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" role="menu">
                <a href="#" class="dropdown-item">Action</a>
                <a href="#" class="dropdown-item">Another action</a>
                <a href="#" class="dropdown-item">Something else here</a>
                <a class="dropdown-divider"></a>
                <a href="#" class="dropdown-item">Separated link</a>
            </div>
        </div>
    @endif

    @if ($tools)
        <div class="btn-group btn-group-sm" role="group" aria-label="add-button">
            <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-lte-toggle="card-maximize">
                <i class="fas fa-expand"></i>
            </button>
            <button type="button" class="btn btn-tool" data-lte-dismiss="card-remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif
</div>
