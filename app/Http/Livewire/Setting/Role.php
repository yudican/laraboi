<?php

namespace App\Http\Livewire\Setting;

use App\Models\Role as ModelsRole;
use Livewire\Component;

class Role extends Component
{
    
    public $role_id, $role_type, $role_name, $role_description;
    public $select = 5, $search;
    public $modal_title = 'Tambah Role';
    public $update_mode = false;

    public function render()
    {
        $where = [
            ['role_name', 'like', '%' . $this->search . '%']
        ];
        return view('livewire.setting.role', [
            'items' => ModelsRole::where($where)->paginate($this->select)
        ]);
    }

    public function store()
    {
        $rules = [
            'role_type' => 'required',
            'role_name' => 'required',
        ];
        $this->validate($rules);
        ModelsRole::create([
            'role_type' => $this->role_type,
            'role_name' => $this->role_name,
            'role_description' => $this->role_description,
        ]);
        $msg = 'Data Berhasil Ditambah';
        $this->emit('roleStore', ['msg' => $msg]);
        $this->resetForm();
    }

    public function update()
    {
        $rules = [
            'role_type' => 'required',
            'role_name' => 'required',
        ];
        $this->validate($rules);

        $input = [
            'role_type' => $this->role_type,
            'role_name' => $this->role_name,
            'role_description' => $this->role_description,
        ];

        ModelsRole::find($this->role_id)->update($input);
        $msg = 'Data Role Berhasil Dipebarui';
        $this->emit('roleStore', ['msg' => $msg]);
        $this->resetForm();
    }

    public function delete()
    {
        $role = ModelsRole::find($this->role_id);
        $role->delete();
        $msg = 'Data Role Berhasil Dihapus';
        $this->emit('roleStore', ['msg' => $msg]);
        $this->resetForm();
    }

    public function edit($id)
    {
        // update title
        $this->modal_title = 'Update Role';
        $this->update_mode = true;
        // get data by id
        $row = ModelsRole::find($id);
        $this->role_id = $row->id;
        $this->role_type = $row->role_type;
        $this->role_name = $row->role_name;
        $this->role_description = $row->role_description;
    }

    public function resetForm()
    {
        $this->role_id = null;
        $this->role_type = '';
        $this->role_name = '';
        $this->role_description = '';
        $this->modal_title = 'Tambah Role';
        $this->update_mode = false;
    }
}
