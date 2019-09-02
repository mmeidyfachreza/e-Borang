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

        $role_pemimpin = Role::where('name','pemimpin')->first();
        $role_prodi  = Role::where('name', 'prodi')->first();
        $role_admin  = Role::where('name', 'admin')->first();
    
        for ($i=0; $i <5 ; $i++) { 
            # code...
            $dosen = new User();
            $dosen->name = $faker->firstName();
            $dosen->no_identitas= $faker->randomNumber($nbDigits=8,$strict=true);
            $dosen->alamat= "jalan rahasia";
            $dosen->tgl_lahir= $faker->date($year='Y-m-d',$max='now');
            $dosen->no_hp= "08533827312";
            $dosen->email = preg_replace('/@example\..*/', '@stmik.com', $faker->unique()->safeEmail);
            $dosen->password = bcrypt('pemimpin');
            $dosen->save();
            $dosen->roles()->attach($role_pemimpin);
        }

        for ($i=0; $i <5 ; $i++) { 
            # code...
            $operator = new User();
            $operator->name = $faker->firstName();
            $operator->no_identitas= $faker->randomNumber($nbDigits=8,$strict=true);
            $operator->alamat= "jalan rahasia";
            $operator->tgl_lahir= $faker->date($year='Y-m-d',$max='now');
            $operator->no_hp= "08533827312";
            $operator->email = preg_replace('/@example\..*/', '@stmik.com', $faker->unique()->safeEmail);
            $operator->password = bcrypt('prodi');
            $operator->save();
            $operator->roles()->attach($role_prodi);
        }

        $admin = new User();
        $admin->name = 'admin';
        $admin->no_identitas= $faker->randomNumber($nbDigits=8,$strict=true);
        $admin->alamat= "jalan rahasia";
        $admin->tgl_lahir= $faker->date($year='Y-m-d',$max='now');
        $admin->no_hp= "08533827312";
        $admin->email = 'admin@stmik.com';
        $admin->password = bcrypt('admin123');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
