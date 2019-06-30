<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::truncate();

        $adminRole      = Role::where('name', 'admin')->first();
        $resellerRole   = Role::where('name', 'reseller')->first();
        $userRole      = Role::where('name', 'user')->first();


        $admin  = User::create([
            'name'  => 'admin',
            'email' => 'admin@mail.com',
            'password'  => bcrypt('admin')
        ]);

        $reseller  = User::create([
            'name'  => 'reseller',
            'email' => 'reseller@mail.com',
            'password'  => bcrypt('reseller')
        ]);

        $user  = User::create([
            'name'  => 'user',
            'email' => 'user@mail.com',
            'password'  => bcrypt('user')
        ]);

        $admin ->roles()->attach($adminRole);
        $reseller ->roles()->attach($resellerRole);
        $user ->roles()->attach($userRole);

    }
}
