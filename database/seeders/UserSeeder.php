<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\User;

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
            'dni' => '11111111P',
            'email' => 'pablopablo@gmail.com',
            'password' => '12345678',
            'peso' => '40',
            'altura' => '190',
            'fechaNac' => '01/07/2000',
            'sexo' => 'H'
        ]);
    }
}
