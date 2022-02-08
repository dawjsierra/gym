<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    use HasFactory;
    /*$fecha->format('d-m-Y');

    //añadir al modelo este atributo
    //columnas a indicar, las que son fechas
    //conversion automatica de la bbdd
    protected $dates = ['date'];

    $day = \Carbon\Carbon::dateFormat('2022-1-1');
    $days = $day->daysInMonth +1

    //buscar en google "laravel foreach days in month*/

    /* buscar info de Laravel Carbon */

    //add  0802
    public function users(){
        return $this->belongsToMany(User::class);
    }

    //add 0802
    public function sign($user){
        $this->users()->attach($user);
    }

}
