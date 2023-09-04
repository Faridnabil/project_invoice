<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    public function run()
    {
        // reset cahced roles and permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'View User']);
        Permission::create(['name' => 'Create User']);
        Permission::create(['name' => 'Edit User']);
        Permission::create(['name' => 'Delete User']);
        Permission::create(['name' => 'Publish User']);
        Permission::create(['name' => 'Unpublish User']);

        //create roles and assign existing permissions
        $adminRole = Role::create(['name' => 'Administrator']);
        $adminRole->givePermissionTo('View User');
        $adminRole->givePermissionTo('Create User');
        $adminRole->givePermissionTo('Edit User');
        $adminRole->givePermissionTo('Delete User');
        $adminRole->givePermissionTo('Publish User');
        $adminRole->givePermissionTo('Unpublish User');

        $user = User::factory()->create([
            'name' => 'Admin Gen-Z Company',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('qwerty12')
        ]);
        $user->assignRole($adminRole);
    }
}
