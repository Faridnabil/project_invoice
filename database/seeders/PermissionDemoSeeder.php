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

        // gets all permissions via Gate::before rule
        $superadminRole = Role::create(['name' => 'Super Admin']);

        //create roles and assign existing permissions
        $adminRole = Role::create(['name' => 'Administrator']);
        $adminRole->givePermissionTo('View User');
        $adminRole->givePermissionTo('Create User');
        $adminRole->givePermissionTo('Edit User');
        $adminRole->givePermissionTo('Delete User');
        $adminRole->givePermissionTo('Publish User');
        $adminRole->givePermissionTo('Unpublish User');

        $prodiRole = Role::create(['name' => 'Prodi']);
        $prodiRole->givePermissionTo('View User');
        $prodiRole->givePermissionTo('Create User');

        $hodRole = Role::create(['name' => 'Kepala Department']);
        $hodRole->givePermissionTo('View User');

        $yayasanRole = Role::create(['name' => 'Yayasan']);
        $yayasanRole->givePermissionTo('View User');

        $purchaseRole = Role::create(['name' => 'Purchase']);
        $purchaseRole->givePermissionTo('View User');


        // create demo users
        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('@Qwerty12')
        ]);
        $user->assignRole($superadminRole);

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('@Qwerty12')
        ]);
        $user->assignRole($adminRole);

        $user = User::factory()->create([
            'name' => 'TRPL',
            'email' => 'trpl@gmail.com',
            'password' => bcrypt('@Qwerty12')
        ]);
        $user->assignRole($prodiRole);

        $user = User::factory()->create([
            'name' => 'Mesin',
            'email' => 'mesin@gmail.com',
            'password' => bcrypt('@Qwerty12')
        ]);
        $user->assignRole($prodiRole);

        $user = User::factory()->create([
            'name' => 'Mekatronika',
            'email' => 'mekatronika@gmail.com',
            'password' => bcrypt('@Qwerty12')
        ]);
        $user->assignRole($prodiRole);

        $user = User::factory()->create([
            'name' => 'Listrik',
            'email' => 'listrik@gmail.com',
            'password' => bcrypt('@Qwerty12')
        ]);
        $user->assignRole($prodiRole);

        $user = User::factory()->create([
            'name' => 'Head of Department',
            'email' => 'hod@gmail.com',
            'password' => bcrypt('@Qwerty12')
        ]);
        $user->assignRole($hodRole);

        $user = User::factory()->create([
            'name' => 'Yayasan',
            'email' => 'yayasan@gmail.com',
            'password' => bcrypt('@Qwerty12')
        ]);
        $user->assignRole($yayasanRole);

        $user = User::factory()->create([
            'name' => 'Purchase',
            'email' => 'purchase@gmail.com',
            'password' => bcrypt('@Qwerty12')
        ]);
        $user->assignRole($purchaseRole);
    }
}
