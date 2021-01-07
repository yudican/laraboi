<?php

namespace App\Http\Livewire\Setting;

use App\Models\Permission as ModelsPermission;
use Livewire\Component;

class Permission extends Component
{
    public $permission_id, $permission_name;
    public $select = 5, $search;
    public $modal_title = 'Tambah Permission';
    public $update_mode = false;

    public function render()
    {
        $where = [
            ['permission_name', 'like', '%' . $this->search . '%']
        ];
        return view('livewire.setting.permission', [
            'items' => ModelsPermission::where($where)->paginate($this->select)
        ]);
    }

    public function store()
    {
        $rules = [
            'permission_name' => 'required',
        ];
        $this->validate($rules);
        ModelsPermission::create([
            'permission_name' => $this->permission_name,
            'permission_value' => strtolower(str_replace(' ', '-', $this->permission_name))
        ]);
        $msg = 'Data Berhasil Ditambah';
        $this->emit('permissionStore', ['msg' => $msg]);
        $this->resetForm();
    }

    public function update()
    {
        $rules = [
            'permission_name' => 'required',
        ];
        $this->validate($rules);

        $input = [
            'permission_name' => $this->permission_name,
            'permission_value' => strtolower(str_replace(' ', '-', $this->permission_name))
        ];

        ModelsPermission::find($this->permission_id)->update($input);
        $msg = 'Data Permission Berhasil Dipebarui';
        $this->emit('permissionStore', ['msg' => $msg]);
        $this->resetForm();
    }

    public function delete()
    {
        $permission = ModelsPermission::find($this->permission_id);
        $permission->delete();
        $msg = 'Data Permission Berhasil Dihapus';
        $this->emit('permissionStore', ['msg' => $msg]);
        $this->resetForm();
    }

    public function edit($id)
    {
        // update title
        $this->modal_title = 'Update Permission';
        $this->update_mode = true;
        // get data by id
        $row = ModelsPermission::find($id);
        $this->permission_id = $row->id;
        $this->permission_name = $row->permission_name;
    }

    public function resetForm()
    {
        $this->permission_id = null;
        $this->permission_name = '';
        $this->modal_title = 'Tambah Permission';
        $this->update_mode = false;
    }
}
