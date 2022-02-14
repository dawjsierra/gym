<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pablo turututu',
            'dni' => '11111111P',
            'email' => 'pablopablo@gmail.com',
            'password' => Hash::make('12345678'),
            'peso' => '40',
            'altura' => '190',
            'fechaNac' => '01/07/2000',
            'sexo' => 'H',
            'role' => 'user'
        ]);

        User::create([
            'name' => 'admin',
            'dni' => '99999999P',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'peso' => '10',
            'altura' => '200',
            'fechaNac' => '00/00/00',
            'sexo' => 'H',
            'role' => 'admin'
        ]);
    }
}
