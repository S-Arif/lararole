<?php

namespace Ge\Lararole\Ge;

use Viftech\Useracl\Http\Models\Permission;

trait Rolable
{

    public function roles()
    {
        return $this->belongsToMany(Permission::class);
    }

}