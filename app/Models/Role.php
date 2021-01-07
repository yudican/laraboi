<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    use Uuid;

    public $incrementing = false;

    protected $fillable = ['role_type','role_name', 'role_description'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }

}
