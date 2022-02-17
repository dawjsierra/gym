<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Sesion;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Laravel\Ui\Presets\React;
use Whoops\Run;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SesionController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sign(Request $request)
    {
        $sesion = Sesion::find($request->sesion_id);    //recoge sesion seleccionada
        $this->user = User::find($request->user_id); //recoge user actual
        $user = $this->user;
        $user->sesions()->attach($sesion);
        return redirect('/users');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesions = Sesion::all();
        $activities = Activity::all();
        $user = User::all();
        $this->user = User::find(Auth::user()->id);

        return view('sesions.index', ['sesions' => $sesions, 'activities' => $activities, 'user' => $this->user->name]);
    }

    public function filter(Request $request)
    {
        $filter = $request->filter;

        $activities = Activity::where('nomActividad', 'LIKE', "%$filter%")->get();
        return $activities;
    }

    public function search($id)
    {

        $data = $id; //le llega el activity_id
        $sesions = Sesion::where('activity_id', 'LIKE', "%$data%")->get();
        dd($sesions);
        return $sesions;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activity = Activity::all();
        return view('sesions.create', ['activities' => $activity]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules =  [
            'actividad' => 'required',
            'dias' => 'required',
            'horaInicio' => 'required',
            'horaFin' => 'required',
            'day' => 'required'
        ];
        $request->validate($rules);

        // $validated = $request->validate([

        //     'actividad' => 'required',
        //     'dias[]' => 'required',
        //     'horaInicio' => 'required',
        //     'horaFin' => 'required',
        //     'day' => 'required'
        // ]);

        /*if($validated->fails()){
            return redirect('sesions/create')
                        ->withErrors($validated)
                        ->withInput();
        }*/

        // dd($request->all());



        // $dayy = $request->$day;
        // $mes = date("m", $dayy);
        // $dia = date("d", $dayy);
        // $anyo = date("y", $dayy);

        // dd($request->day);

        $inicio = Carbon::createFromFormat('Y-m-d', $request->day);
        $fin = Carbon::createFromFormat('Y-m-d', $request->day);


        $arrayHoraIncio = explode(":", $request->horaInicio);

        $HoraIncio = $arrayHoraIncio[0];
        $MinutosIncio = $arrayHoraIncio[1];
        $inicio->hour($HoraIncio);
        $inicio->minute($MinutosIncio);
        $inicio->seconds("0");
        // dd($inicio);


        $arrayHoraFin = explode(":", $request->horaFin);
        $HoraFin = $arrayHoraFin[0];
        $MinutosFin = $arrayHoraFin[1];
        $fin->hour($HoraFin);
        $fin->minute($MinutosFin);
        $fin->seconds("0");
        // dd($fin);

        // $arrDias = ['Monday','Friday'];
        $arrDias = $request->dias;

        // $activity = Activity::find( $id );
        $activity = Activity::find($request->actividad);

        // echo $fecha->hour;
        // echo $fecha->minute;
        // echo $fecha->second;



        // $this->fill_month( $activity, $arrDias, $inicio, $fin ) ;
        $this->fill_month_NEW($activity, $arrDias, $inicio, $fin);
        //dd(Sesion::all());

        return redirect('/sesions');
        //return redirect('/sesions');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sesion = Sesion::find($id);
        $activity = Activity::find($sesion->activity_id);

        $activity = Activity::with("sesions")->get();

        return view('sesions.show', ['sesions' => $sesion, 'activity' => $activity]);
    }

    //FORMULARIO (NOMBRE, FECHA) + TABLA VACIA
    public function filterView()
    {
        $activities = Activity::all();
        $user = User::find(Auth::user()->id);
        return view('sesions.search', ['activities' => $activities, 'user' => $user]);
    }

    //GET: RECIBE NOMBRE / FECHA  DEVUELVE ARRAY SESIONES FILTRADAS
    public function filtrado(Request $request)
    {

        $nombre = $request->nombre;
        $date = $request->date;
        $sesiones = [];
        if ($date != "") {
            // $respuesta = Sesion::where('fechaInicio', 'LIKE', "%$date%")->get();
            $respuesta = Sesion::where('horaInicio', 'LIKE', "%$date%")->get();
            if (count($respuesta) == 0) {
                $respuesta = "No hay sesiones disponibles en la fecha elegida";
            }
        } else if ($nombre != "" &&  $nombre != "&" &&  $nombre != null) {
            $actividad = Activity::where('nomActividad', 'LIKE', "%$nombre%")->get();
            $activ_id = $actividad[0]->id;

            if (count($actividad) == 0) {
                $respuesta = "No hay sesiones disponibles con ese nombre";
            } else {
                $respuesta = Sesion::where('activity_id', 'LIKE', "%$activ_id%")->get();
            }
        }

        return $respuesta;
    }

    // public function findSelect($request){

    //     dd($request);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function edit(Sesion $sesion)
    {
        return view('sesions.edit', ['sesion' => $sesion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sesion $sesion)
    {
        $sesion->fill($request->all());
        $sesion->save();
        return redirect('/sesions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sesion $sesion)
    {
        //
    }

    public function fill_month($activity, $arrDias, $fechaInicio, $fechaFin)
    {

        for ($i = 1; $i < $fechaInicio->daysInMonth + 1; ++$i) {

            $horaInicio = Carbon::create($fechaInicio->year, $fechaInicio->month, $i, $fechaInicio->hour, $fechaInicio->minute, $fechaInicio->second);
            $horaFin = Carbon::create($fechaFin->year, $fechaFin->month, $i, $fechaFin->hour, $fechaFin->minute, $fechaFin->second);

            if ((in_array($horaInicio->englishDayOfWeek, $arrDias))) {

                $sesion = new Sesion;
                $sesion->horaInicio = $horaInicio->format('Y-m-d h:i:s');
                $sesion->horaFin = $horaFin->format('Y-m-d h:i:s');
                $sesion->activity_id = $activity->id;
                $sesion->save();

                // $sesions[] = $sesion;
                // echo $dia->englishDayOfWeek;
            }
            return redirect('/sesions');
            // $dates[] = Carbon::createFromDate($fecha->year, $fecha->month, $i, $fecha->hour, $fecha->minute,$fecha->second )->format('Y-m-d h:i:s');
        }
        // return $sesions;

    }





    public function fill_month_NEW($activity, $arrDias, $fechaInicio, $fechaFin)
    {

        for ($i = 1; $i < $fechaInicio->daysInMonth + 1; ++$i) {

            $horaInicio = Carbon::create($fechaInicio->year, $fechaInicio->month, $i, $fechaInicio->hour, $fechaInicio->minute, $fechaInicio->second);
            $horaFin = Carbon::create($fechaFin->year, $fechaFin->month, $i, $fechaFin->hour, $fechaFin->minute, $fechaFin->second);

            if ((in_array($horaInicio->englishDayOfWeek, $arrDias) && ($fechaInicio <= $horaInicio))) {

                $sesion = new Sesion;
                $sesion->horaInicio = $horaInicio->format('Y-m-d h:i:s');
                $sesion->horaFin = $horaFin->format('Y-m-d h:i:s');
                $sesion->activity_id = $activity->id;
                $sesion->save();

                // $sesions[] = $sesion;
                // echo $dia->englishDayOfWeek;
            }

            // $dates[] = Carbon::createFromDate($fecha->year, $fecha->month, $i, $fecha->hour, $fecha->minute,$fecha->second )->format('Y-m-d h:i:s');
        }
    }
}
