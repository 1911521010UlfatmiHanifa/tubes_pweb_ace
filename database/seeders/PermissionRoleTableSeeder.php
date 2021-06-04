<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $super_admin_permissions = Permission::all();

        // Role::findOrFail(1)->permissions()->sync($super_admin_permissions->pluck('id'));

        $admin_permissions = $super_admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 4) != 'krs_';
        });

        Role::findOrFail(1)->permissions()->sync($admin_permissions);

        $mahasiswa_permissions = $super_admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 4) == 'krs_';
        });

        Role::findOrFail(2)->permissions()->sync($mahasiswa_permissions);
    }
}
