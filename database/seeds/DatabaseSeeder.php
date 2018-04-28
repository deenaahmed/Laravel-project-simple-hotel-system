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
            'avatar_image' => '/avatars2/Nophoto.jpg',
        ]);
        $admin = User::where('email', '=', '​admin@admin.com')->first();
        $role = Role::create(['name' => 'admin']);
        $admin->assignRole('admin');
        $role1 = Role::create(['name' => 'manager']);
        $role2 = Role::create(['name' => 'receptionist']);
        $role3 = Role::create(['name' => 'client']);
    }
}
