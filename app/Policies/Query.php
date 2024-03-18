<?php

namespace App\Policies;
use Illuminate\Support\Facades\DB;

class Query
{
    public function cek($id, $access)
    {
        $q = DB::table('users')
            ->join('role_has_permissions', 'users.role_id', '=', 'role_has_permissions.role_id')
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('users.id', $id)
            ->select('permissions.name')
            ->get();
        $permission = [];
        foreach ($q as $k => $v) {
            array_push($permission, $v->name);
        }
        if (in_array($access, $permission)) {
            return true;
        }else{
            $r = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where('users.id', $id)
            ->select('roles.name')
            ->first();
            return $r->name == 'Superadmin' ? true : false ;
        }
    }
}
