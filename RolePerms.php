<?php

/**
 * roles & permissions : management peran user dan hak akses user
 */

namespace App\Libraries;

use DB;

class RolePerms
{
    public static function role($role)
    {
       return DB::table('user_roles')
                   ->leftjoin('_role_user','_role_user.role_id','user_roles.id')
                   ->leftjoin('users','users.id','_role_user.user_id')
                   ->where('users.id', \Auth::user()->id)
                   ->where('user_roles.label', $role)
                   ->exists();
    }

    public static function isView($modul)
    {
        // cek role user
        $role = DB::table('_role_user')
                    ->where('user_id', \Auth::user()->id)
                    ->first()->role_id;

        if($role != 1)
            return DB::table('user_permissions')
                        ->leftjoin('_role_user','_role_user.role_id','user_permissions.role_id')
                        ->leftjoin('setting_modul','setting_modul.id','user_permissions.modul_id')
                        ->leftjoin('users','users.id','_role_user.user_id')
                        ->where('user_permissions.role_id', $role)
                        ->where('user_permissions.modul_id', $modul)
                        ->where('user_permissions.is_view', 1)
                        ->exists();
        else
            return DB::table('user_permissions')
                        ->leftjoin('_role_user','_role_user.role_id','user_permissions.role_id')
                        ->leftjoin('setting_modul','setting_modul.id','user_permissions.modul_id')
                        ->leftjoin('users','users.id','_role_user.user_id')
                        ->where('user_permissions.is_view', 1)
                        ->exists();
    }

    public static function isCreate($label)
    {
        // cek role user
        $role = DB::table('_role_user')
                    ->where('user_id', \Auth::user()->id)
                    ->first()->role_id;
        // cek modul
        $modul = App\Models\Settings\Modul::where('name',$label)->first()->id;

        if($role != 1)
            return DB::table('user_permissions')
                        ->leftjoin('_role_user','_role_user.role_id','user_permissions.role_id')
                        ->leftjoin('setting_modul','setting_modul.id','user_permissions.modul_id')
                        ->leftjoin('users','users.id','_role_user.user_id')
                        ->where('user_permissions.role_id', $role)
                        ->where('user_permissions.modul_id', $modul)
                        ->where('user_permissions.is_create', 1)
                        ->exists();
        else
            return DB::table('user_permissions')
                        ->leftjoin('_role_user','_role_user.role_id','user_permissions.role_id')
                        ->leftjoin('setting_modul','setting_modul.id','user_permissions.modul_id')
                        ->leftjoin('users','users.id','_role_user.user_id')
                        ->where('user_permissions.is_create', 1)
                        ->exists();
    }

    public static function isShow($label)
    {
        // cek role user
        $role = DB::table('_role_user')
                    ->where('user_id', \Auth::user()->id)
                    ->first()->role_id;
        // cek modul
        $modul = App\Models\Settings\Modul::where('name',$label)->first()->id;

        if($role != 1)
            return DB::table('user_permissions')
                        ->leftjoin('_role_user','_role_user.role_id','user_permissions.role_id')
                        ->leftjoin('setting_modul','setting_modul.id','user_permissions.modul_id')
                        ->leftjoin('users','users.id','_role_user.user_id')
                        ->where('user_permissions.role_id', $role)
                        ->where('user_permissions.modul_id', $modul)
                        ->where('user_permissions.is_show', 1)
                        ->exists();
        else
            return DB::table('user_permissions')
                        ->leftjoin('_role_user','_role_user.role_id','user_permissions.role_id')
                        ->leftjoin('setting_modul','setting_modul.id','user_permissions.modul_id')
                        ->leftjoin('users','users.id','_role_user.user_id')
                        ->where('user_permissions.is_show', 1)
                        ->exists();
    }

    public static function isEdit($label)
    {
        // cek role user
        $role = DB::table('_role_user')
                    ->where('user_id', \Auth::user()->id)
                    ->first()->role_id;
        // cek modul
        $modul = App\Models\Settings\Modul::where('name',$label)->first()->id;

        if($role != 1)
            return DB::table('user_permissions')
                        ->leftjoin('_role_user','_role_user.role_id','user_permissions.role_id')
                        ->leftjoin('setting_modul','setting_modul.id','user_permissions.modul_id')
                        ->leftjoin('users','users.id','_role_user.user_id')
                        ->where('user_permissions.role_id', $role)
                        ->where('user_permissions.modul_id', $modul)
                        ->where('user_permissions.is_edit', 1)
                        ->exists();
        else
            return DB::table('user_permissions')
                        ->leftjoin('_role_user','_role_user.role_id','user_permissions.role_id')
                        ->leftjoin('setting_modul','setting_modul.id','user_permissions.modul_id')
                        ->leftjoin('users','users.id','_role_user.user_id')
                        ->where('user_permissions.is_edit', 1)
                        ->exists();
    }

    public static function isDelete($label)
    {
        // cek role user
        $role = DB::table('_role_user')
                    ->where('user_id', \Auth::user()->id)
                    ->first()->role_id;
        // cek modul
        $modul = App\Models\Settings\Modul::where('name',$label)->first()->id;

        if($role != 1)
            return DB::table('user_permissions')
                        ->leftjoin('_role_user','_role_user.role_id','user_permissions.role_id')
                        ->leftjoin('setting_modul','setting_modul.id','user_permissions.modul_id')
                        ->leftjoin('users','users.id','_role_user.user_id')
                        ->where('user_permissions.role_id', $role)
                        ->where('user_permissions.modul_id', $modul)
                        ->where('user_permissions.is_delete', 1)
                        ->exists();
        else
            return DB::table('user_permissions')
                        ->leftjoin('_role_user','_role_user.role_id','user_permissions.role_id')
                        ->leftjoin('setting_modul','setting_modul.id','user_permissions.modul_id')
                        ->leftjoin('users','users.id','_role_user.user_id')
                        ->where('user_permissions.is_delete', 1)
                        ->exists();
    }

    public static function isLog($label)
    {
        // cek role user
        $role = DB::table('_role_user')
                    ->where('user_id', \Auth::user()->id)
                    ->first()->role_id;
        // cek modul
        $modul = App\Models\Settings\Modul::where('name',$label)->first()->id;

        if($role != 1)
            return DB::table('user_permissions')
                        ->leftjoin('_role_user','_role_user.role_id','user_permissions.role_id')
                        ->leftjoin('setting_modul','setting_modul.id','user_permissions.modul_id')
                        ->leftjoin('users','users.id','_role_user.user_id')
                        ->where('user_permissions.role_id', $role)
                        ->where('user_permissions.modul_id', $modul)
                        ->where('user_permissions.is_log', 1)
                        ->exists();
        else
            return DB::table('user_permissions')
                        ->leftjoin('_role_user','_role_user.role_id','user_permissions.role_id')
                        ->leftjoin('setting_modul','setting_modul.id','user_permissions.modul_id')
                        ->leftjoin('users','users.id','_role_user.user_id')
                        ->where('user_permissions.is_log', 1)
                        ->exists();
    }

    public static function isExport($label)
    {
        // cek role user
        $role = DB::table('_role_user')
                    ->where('user_id', \Auth::user()->id)
                    ->first()->role_id;
        // cek modul
        $modul = App\Models\Settings\Modul::where('name',$label)->first()->id;

        if($role != 1)
            return DB::table('user_permissions')
                        ->leftjoin('_role_user','_role_user.role_id','user_permissions.role_id')
                        ->leftjoin('setting_modul','setting_modul.id','user_permissions.modul_id')
                        ->leftjoin('users','users.id','_role_user.user_id')
                        ->where('user_permissions.role_id', $role)
                        ->where('user_permissions.is_export', 1)
                        ->where('user_permissions.modul_id', $modul)
                        ->exists();
            else
                return DB::table('user_permissions')
                            ->leftjoin('_role_user','_role_user.role_id','user_permissions.role_id')
                            ->leftjoin('setting_modul','setting_modul.id','user_permissions.modul_id')
                            ->leftjoin('users','users.id','_role_user.user_id')
                            ->where('user_permissions.is_export', 1)
                            ->exists();
    }
}

?>
