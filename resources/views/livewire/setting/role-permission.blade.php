<div class="page-inner" style="margin-top: 5%">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <span>Assign Permission</span>

                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Permission Name</th>
                                    <th>#</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($items))
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->permission_name }}</td>
                                            <td>
                                                @if ($item->roles->count() > 0)
                                                    <div wire.ignore>
                                                        <input  type="checkbox" class="form-control"
                                                            wire:model="permission_id" value="{{ $item->id }}"
                                                            name="permission_id[]" id="{{ $item->id }}"
                                                            {{ $item->id == $item->roles->first()->pivot->permission_id ? 'checked' : '' }}>
                                                    </div>
                                                @else
                                                    <div wire.ignore>
                                                        <input type="checkbox" class="form-control"
                                                            wire:model="permission_id" value="{{ $item->id }}"
                                                            name="permission_id[]" id="{{ $item->id }}" >
                                                    </div>
                                                @endif

                                            </td>
                                            <td>
                                                <button data-toggle="modal" data-target="#permission-modal"
                                                    class="btn btn-success btn-sm" id="btn-edit"
                                                    wire:click="edit('{{ $item->id }}')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button data-toggle="modal" data-target="#confirm-modal"
                                                    class="btn btn-danger btn-sm" id="btn-edit"
                                                    wire:click="edit('{{ $item->id }}')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <h4 class="card-title">Tidak Ada Data</h4>
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <button wire:click="store" type="button" class="btn btn-primary btn-sm pull-right" id="btn-add">
                        <i class="fas fa-check mr-2"></i>
                        <span>Simpan</span>
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
