<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_dosen = new Role();
        $role_dosen->name = 'dosen';
        $role_dosen->description = 'ini user dosen';
        $role_dosen->save();

        $role_operator = new Role();
        $role_operator->name = 'operator';
        $role_operator->description = 'ini user operator';
        $role_operator->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'ini user admin';
        $role_admin->save();
    }
}
