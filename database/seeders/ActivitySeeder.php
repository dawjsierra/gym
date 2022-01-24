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
            'descripcion' => 'clase de bicicletamiento',
            'duracion' => '55',
            'maxParticipantes' => '22'
        ]);

        Activity::create([
            'nomActividad' => 'yoga',
            'descripcion' => 'clase de relajacion',
            'duracion' => '55',
            'maxParticipantes' => '12'
        ]);
    }
}
