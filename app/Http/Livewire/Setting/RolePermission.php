<?php

namespace App\Http\Livewire\Setting;

use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;

class RolePermission extends Component
{
    public $role_id, $permission_id = [];

    public function mount($role_id)
    {
        $this->role_id = $role_id;
        $permission_id = Permission::with('roles')->whereHas('roles', function($query) use($role_id){
           return $query->where('roles.id', $role_id);
        })->pluck('permissions.id')->toArray();
        $this->permission_id = $permission_id;
    }
    public function render()
    {
        // dd($this->permission_id);
        // dd(Permission::with('roles')->get());
        return view('livewire.setting.role-permission', [
            'items' => Permission::with('roles')->get()
        ]);
    }

    public function store()
    {
        Role::find($this->role_id)->permissions()->sync($this->permission_id);

        return redirect('role');
    }
}
