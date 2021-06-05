<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTabelaPermissions extends Seeder
{

    public function run()
    {
        $permissions = ['role-list',
                        'role-create',
                        'role-edit',
                        'role-delete',
                        'Cliente-list',
                        'Cliente-create',
                        'Cliente-edit',
                        'Cliente-delete'];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
