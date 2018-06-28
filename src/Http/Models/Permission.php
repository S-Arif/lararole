<?php

namespace Ge\Lararole\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'gate', 'module'];

    public static function findModulePermissions()
    {
        $permissions = self::all();

        $temp = [];

        foreach($permissions as $p)  { $temp[$p->module][] = $p; }

        return $temp;

    }
}
