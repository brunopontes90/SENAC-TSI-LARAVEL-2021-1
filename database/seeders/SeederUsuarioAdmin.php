<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SeederUsuarioAdmin extends Seeder
{

    public function run()
    {
        $user = User::create([  'name' => 'Bruno Pontes',
                                'email' => 'bruno@senac.br',
                                'password' => bcrypt('9012@TIBruno')
                            ]);
        $role = Role::create([ 'name' => 'Admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
