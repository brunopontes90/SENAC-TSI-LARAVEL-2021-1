<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

class AddPermissionProduct extends Seeder
{

    public function run()
    {
        $permissions = [
                        'products-list',
                        'products-create',
                        'products-edit',
                        'products-delete',
                        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
