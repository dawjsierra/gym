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

class SesionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    protected $user;

    public function sign($id){

        $sesion = Sesion::find($id);    //recoge sesion seleccionada
        $this->user = User::find(Auth::user()->id); //recoge user actual
        $user = $this->user;
        $user->sesions()->attach($sesion);
        // $ahora = new \DateTime();
        // dd($ahora->format('d-m-Y H:i:s' ));

        return view('/home');
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
        
        return view('sesions.index',['sesions' => $sesions,'activities' => $activities, 'user' => $this->user->name ] );
    }

    public function filter(Request $request){
        $filter = $request->filter;
        
        $activities = Activity::where('nomActividad','LIKE',"%$filter%")->get();
        return $activities;
    }

    public function search(Request $request){


        $data = $request->search;
    
        $sesions = Sesion::where('id','LIKE',"%$data%")->get();
        return $sesions;
        //return view('sesions.search',['sesions' => $sesions ] );
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activity = Activity::all();
        return view('sesions.create',['activities' => $activity]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        

        // $dayy = $request->$day;
        // $mes = date("m", $dayy);
        // $dia = date("d", $dayy);
        // $anyo = date("y", $dayy);

        $inicio = Carbon::createFromFormat('Y-m-d', $request->day );
        $fin = Carbon::createFromFormat('Y-m-d', $request->day );


        $arrayHoraIncio = explode(":",$request->horaInicio);

        $HoraIncio = $arrayHoraIncio[0];
        $MinutosIncio = $arrayHoraIncio[1];
        $inicio->hour($HoraIncio);
        $inicio->minute($MinutosIncio);
        $inicio->seconds("0");
        // dd($inicio);
       

        $arrayHoraFin = explode(":",$request->horaFin);
        $HoraFin = $arrayHoraFin[0];
        $MinutosFin = $arrayHoraFin[1];
        $fin->hour($HoraFin);
        $fin->minute($MinutosFin);
        $fin->seconds("0");
        // dd($fin);

        // $arrDias = ['Monday','Fridaylogout
        // echo $fecha->hour;
        // echo $fecha->minute;
        // echo $fecha->second;

       

        // $this->fill_month( $activity, $arrDias, $inicio, $fin ) ;
        $this->fill_month_NEW( $activity, $arrDias, $inicio, $fin ) ;
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
        dd($id);
        $sesion = Sesion::find($id);
        $activity= Activity::find($sesion->activity_id);
        
        return view('sesions.show', ['sesions' => $sesion, 'activity' => $activity]);
    }

   


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function edit(Sesion $sesion)
    {
        return view('sesions.edit',['sesion' => $sesion]);
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
        $sesion -> fill($request->all());
        $sesion -> save();
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

    public function fill_month( $activity, $arrDias, $fechaInicio, $fechaFin ){
        
        for($i=1; $i < $fechaInicio->daysInMonth + 1; ++$i) {

            $horaInicio = Carbon::create($fechaInicio->year, $fechaInicio->month, $i, $fechaInicio->hour, $fechaInicio->minute, $fechaInicio->second );
            $horaFin = Carbon::create($fechaFin->year, $fechaFin->month, $i, $fechaFin->hour, $fechaFin->minute, $fechaFin->second );

            if( ( in_array($horaInicio->englishDayOfWeek, $arrDias ) ) ){

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

    
    

    
    public function fill_month_NEW( $activity, $arrDias, $fechaInicio, $fechaFin ){
        
        for($i=1; $i < $fechaInicio->daysInMonth + 1; ++$i) {

            $horaInicio = Carbon::create($fechaInicio->year, $fechaInicio->month, $i, $fechaInicio->hour, $fechaInicio->minute, $fechaInicio->second );
            $horaFin = Carbon::create($fechaFin->year, $fechaFin->month, $i, $fechaFin->hour, $fechaFin->minute, $fechaFin->second );

            if( ( in_array($horaInicio->englishDayOfWeek, $arrDias ) && ( $fechaInicio <= $horaInicio ) ) ){

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
