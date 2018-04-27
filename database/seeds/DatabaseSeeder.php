<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '​admin@admin.com',
            'email' => '​admin@admin.com',
            'password' => bcrypt('123456'),
        ]);
        $admin = User::where('email', '=', '​admin@admin.com')->first();
        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'admin manage managers']);
        $permission1 = Permission::create(['name' => 'admin manage receptionists']);
        $permission2 = Permission::create(['name' => 'admin manage clients']);
        $role->givePermissionTo($permission);
        $role->givePermissionTo($permission1);
        $role->givePermissionTo($permission2);
        $admin->assignRole('admin');
        $role1 = Role::create(['name' => 'manager']);
        $role2 = Role::create(['name' => 'receptionist']);
        $role3 = Role::create(['name' => 'client']);
    }
}
