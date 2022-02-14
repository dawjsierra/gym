<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateSesionUserTable extends Migration
{

    public static function valorFecha(){
        $fechaActual = new \DateTime();
        $fecha = (string) $fechaActual;
        dd($fecha);
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('sesion_user', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sesion_id');
            //$table->date('date_sign')->default( new \DateTime());
            $table->foreign('sesion_id')->references('id')->on('sesions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sesion_user');
    }
}
