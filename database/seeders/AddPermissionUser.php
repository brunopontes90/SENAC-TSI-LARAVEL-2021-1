<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AddPermissionUser extends Seeder
{

    public function run()
    {
        $permissions = ['user-list',
                        'user-create',
                        'user-edit',
                        'user-delete',
                        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
