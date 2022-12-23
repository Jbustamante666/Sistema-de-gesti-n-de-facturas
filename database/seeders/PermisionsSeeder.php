<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'generate invoices']);
        Permission::create(['name' => 'view invoice']);
        Permission::create(['name' => 'shop']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('generate invoices');
        $role1->givePermissionTo('view invoice');

        $role2 = Role::create(['name' => 'user']);
        $role2->givePermissionTo('shop');

        // create admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole($role1);

        // create user
        $admin = User::create([
            'name' => 'User 1',
            'email' => 'user1@test.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole($role2);
    }
}
