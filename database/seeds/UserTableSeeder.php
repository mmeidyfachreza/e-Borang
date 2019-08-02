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
    
        for ($i=0; $i <20 ; $i++) { 
            # code...
            $dosen = new User();
            $dosen->name = $faker->firstName();
            $dosen->no_identitas= $faker->randomNumber($nbDigits=8,$strict=true);
            $dosen->alamat= $faker->address;
            $dosen->tgl_lahir= $faker->date($year='Y-m-d',$max='now');
            $dosen->no_hp= $faker->phoneNumber;
            $dosen->email = preg_replace('/@example\..*/', '@stmik.com', $faker->unique()->safeEmail);
            $dosen->password = bcrypt('dosen');
            $dosen->save();
            $dosen->roles()->attach($role_dosen);
        }

        for ($i=0; $i <20 ; $i++) { 
            # code...
            $operator = new User();
            $operator->name = $faker->firstName();
            $operator->no_identitas= $faker->randomNumber($nbDigits=8,$strict=true);
            $operator->alamat= $faker->address;
            $operator->tgl_lahir= $faker->date($year='Y-m-d',$max='now');
            $operator->no_hp= $faker->phoneNumber;
            $operator->email = preg_replace('/@example\..*/', '@stmik.com', $faker->unique()->safeEmail);
            $operator->password = bcrypt('operator');
            $operator->save();
            $operator->roles()->attach($role_operator);
        }

        $admin = new User();
        $admin->name = 'admin';
        $admin->no_identitas= $faker->randomNumber($nbDigits=8,$strict=true);
        $admin->alamat= $faker->address;
        $admin->tgl_lahir= $faker->date($year='Y-m-d',$max='now');
        $admin->no_hp= $faker->phoneNumber;
        $admin->email = 'admin@stmik.com';
        $admin->password = bcrypt('admin123');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
