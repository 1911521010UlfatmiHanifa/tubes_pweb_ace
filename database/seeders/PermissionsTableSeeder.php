<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'mahasiswa_access',
            ],

            [
                'id'    => 2,
                'title' => 'kelas_access',
            ],

            [
                'id'    => 3,
                'title' => 'krs_access',
            ],

            // [
            //     'id'    => 4,
            //     'title' => 'user_access',
            // ],

            // [
            //     'id'    => 5,
            //     'title' => 'task_access',
            // ],
        ];

        Permission::insert($permissions);
    }
}
