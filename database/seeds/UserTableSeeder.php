<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');

        $role_dosen = Role::where('name','dosen')->first();
        $role_operator  = Role::where('name', 'operator')->first();
        $role_admin  = Role::where('name', 'admin')->first();
    
        for ($i=0; $i <50 ; $i++) { 
            # code...
            $dosen = new User();
            $dosen->name = $faker->name;
            $dosen->email = preg_replace('/@example\..*/', '@domain.com', $faker->unique()->safeEmail);
            $dosen->password = bcrypt('dosen');
            $dosen->save();
            $dosen->roles()->attach($role_dosen);
        }

        for ($i=0; $i < 50; $i++) { 
            # code...
            $operator = new User();
            $operator->name = $faker->name;
            $operator->email = preg_replace('/@example\..*/', '@domain.com', $faker->unique()->safeEmail);
            $operator->password = bcrypt('operator');
            $operator->save();
            $operator->roles()->attach($role_operator);    
        }

        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('admin123');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
