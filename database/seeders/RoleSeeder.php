<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Role create કરો
        $role = Role::firstOrCreate(['name' => 'admin']);
        $permission = Permission::firstOrCreate(['name' => 'manage users']);
        $role->givePermissionTo($permission);

        $user = User::firstOrCreate(
    ['email' => 'admin@example.com'],
    [
        'name' => 'Super Admin',
        'password' => bcrypt('password'),
    ]
);
         if ($user) {
            $user->assignRole('admin');
        }
    }
}
