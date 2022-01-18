<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        Activity::create([
            'nomActividad' => 'ciclo',
            'dias' => 'l,x,v',
            'nSesiones' => '3',
            'horario' => '10:00 - 10:55',
            'duracion' => '55',
            'maxParticipantes' => '22'
        ]);
    }
}
