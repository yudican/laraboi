<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    use Uuid;

    public $incrementing = false;

    protected $fillable = ['permission_name', 'permission_value'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }
}
