<div class="page-inner" style="margin-top: 5%">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <span>Role List</span>
                        <button wire:click="resetForm" type="button" class="btn btn-primary btn-sm pull-right"
                            id="btn-add">
                            <i class="fas fa-plus mr-2"></i>
                            <span>Tambah Baru</span>
                        </button>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div wire:ignore class="row justify-content-between px-3">
                        <select wire:model="select" id="select2" class="form-control" style="width: 10%">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="100">100</option>
                        </select>
                        <input type="text" class="form-control" style="width: 20%" placeholder="search"
                            wire:model="search" id="">
                    </div>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Role type</th>
                                    <th>Role Name</th>
                                    <th>Keterangan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($items))
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->role_type }}</td>
                                            <td>{{ $item->role_name }}</td>
                                            <td>{{ $item->role_description }}</td>
                                            <td>
                                                <button data-toggle="modal" data-target="#role-modal"
                                                    class="btn btn-success btn-sm" id="btn-edit"
                                                    wire:click="edit('{{ $item->id }}')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button data-toggle="modal" data-target="#confirm-modal"
                                                    class="btn btn-danger btn-sm" id="btn-edit"
                                                    wire:click="edit('{{ $item->id }}')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <a href="{{ route('permission-role', ['role_id' => $item->id]) }}"
                                                    class="btn btn-warning btn-sm" id="btn-edit">
                                                    <i class="fas fa-key"></i>
                                                    Permission
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <h4 class="card-title">Tidak Ada Data</h4>
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    {{ $items->links() }}
                </div>
            </div>
        </div>

        {{-- modal-form --}}
        <!-- Modal -->
        <div class="modal fade" wire:ignore.self id="role-modal" tabindex="-1" role="dialog"
            aria-labelledby="role-modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 wire:ignore.self class="modal-title" id="role-modalLabel">{{ $modal_title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group @error('role_type')has-error has-feedback @enderror">
                            <label for="role_type">Role Type</label>
                            <input type="text" wire:model="role_type" id="role_type" class="form-control" placeholder=""
                                aria-describedby="helpId">
                            @error('role_type')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group @error('role_name')has-error has-feedback @enderror">
                            <label for="role_name">Nama Role</label>
                            <input type="text" wire:model="role_name" id="role_name" class="form-control" placeholder=""
                                aria-describedby="helpId">
                            @error('role_name')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group @error('role_description')has-error has-feedback @enderror">
                            <label for="role_description">Keterangan</label>
                            <textarea type="text" wire:model="role_description" id="role_description"
                                class="form-control" placeholder="" aria-describedby="helpId"></textarea>
                            @error('role_description')
                                <small id="helpId" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary btn-sm"
                            wire:click="{{ $update_mode ? 'update' : 'store' }}">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal-form --}}

        {{-- Modal confirm --}}
        <div id="confirm-modal" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="my-modal-title">Konfirmasi Hapus</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin hapus data ini.?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" wire:click='delete' class="btn btn-danger btn-sm"><i
                                class="fa fa-check pr-2"></i>Ya, Hapus</button>
                        <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times pr-2"></i>Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/select2/select2.full.min.js') }}"></script>
        <script>
            $('#select2').select2({
                theme: "bootstrap",
                minimumResultsForSearch: -1
            });
            $('#select2').on('change', function(e) {
                @this.set('select', e.target.value);
            });

        </script>
    @endpush
    <script>
        document.addEventListener('livewire:load', function(e) {
            e.preventDefault()
            const btnAdd = document.getElementById('btn-add')
            const btnEdit = document.getElementById('btn-edit')
            const modalTitle = document.getElementById('role-modalLabel')

            btnAdd.addEventListener('click', function() {
                $('#role-modal').modal('show')
            })


            // CLOSE MODAL AFTER SUBMIT
            window.livewire.on('roleStore', (data) => {
                let content = {
                    icon: 'fa fa-bell',
                    title: 'Success',
                    message: data.msg
                }
                $.notify(content, {
                    type: 'success',
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    time: 1000,
                    delay: 5000,
                });
                $('#role-modal').modal('hide')
                $('#confirm-modal').modal('hide')
            });

            // Select2

        })

    </script>
</div>
