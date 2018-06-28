<?php

namespace Ge\Lararole\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    public function users()
    {
        return $this->hasMany(\App\User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function syncPermissions($ids)
    {
        return $this->permissions()->sync($ids);
    }
}
