<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'dni' => '11111111P',
            'name' => 'pablo',
            'peso' => '40',
            'altura' => '190',
            'nacimiento' => '01/07/2000',
            'sexo' => 'H'
        ]);
    }
}
