<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Sesion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();
        $rolsito = Auth::user()->role;

        return view('activities.index', ['activities' => $activities, 'rolusuario' => $rolsito]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activities.create');
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
            'nomActividad' => 'required|unique:activities',
            'duracion' => 'required',
            'descripcion' => 'required',
            'maxParticipantes' => 'required',

        ];
        $request->validate($rules);


        $activity = new Activity;
        $nombre = $request->nomActividad;
        $duracion = $request->duracion;
        $descripcion = $request->descripcion;
        $maxParticipantes = $request->maxParticipantes;

        $activity->nomActividad = $nombre;
        $activity->duracion = $duracion;
        $activity->maxParticipantes = $maxParticipantes;
        $activity->descripcion = $descripcion;
        $activity->save();

        return redirect('/activities');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::find($id);
        //$activity = Activity::with("sesions")->get();

        //dd($activity);
        //  dd($activity->sesions);
        // $act_id = $id;
        // $sesion = Sesion::find($act_id);
        return view('activities.show', ['activity' => $activity]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        return view('activities.edit', ['activity' => $activity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Activity $activity)
    {
        
        $activity->fill($request->all());

        // dd($activity);
        // $activity -> save();

        // return redirect('/activity');

        // $activity->code = $request->code;
        // $activity->name = $request->name;
        // $activity->abreviation = $request->abreviation;

        $activity->save();

        return redirect('/activities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
