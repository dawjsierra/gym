<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sesion;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//add

class UserController extends Controller
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
        $users = User::all();
    
       
        $this->users = User::find(Auth::user()->role);
        return view('users.index', ['users' => $users]);
    }

    //add 0802
    public function sign(Request $request)
    {

        $user_id = $request->user_id;
        $sesion_id = $request->sesion_id;

        $user = User::find($user_id);
        $sesion = Sesion::find($sesion_id);
        $user->sesions->attach($sesion_id);
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name' => 'required',
            'dni' => 'required',
            'email' => 'required',
            'password' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'birth' => 'required',
            'sexo' => 'required'

        ];
        $request->validate($rules);


        $user = new User;
        $name = $request->name;
        $dni = $request->dni;
        $email = $request->email;
        $password = $request->password;
        $password = Hash::make($password);
        $peso = $request->weight;
        $altura = $request->height;
        $fechaNac = $request->birth;
        $sexo = $request->sexo;

        $user->name = $name;
        $user->dni = $dni;
        $user->email = $email;
        $user->password = $password;
        $user->peso = $peso;
        $user->altura = $altura;
        $user->fechaNac = $fechaNac;
        $user->sexo = $sexo;
       
        $user->save();

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sesion = Sesion::all();
        $user = User::find($id);
        $actividad = User::all();

        $rolsito = Auth::user()->role;

        //OBTENER IDS DE SESION DE SESION_USER

        //obtenemos los datos de la tabla sesion_user(user_id/sesion_id/signdate)
        $tabla_reservas = DB::table('sesion_user')->get();
        //declaramos array fuera del foreach
        $sesionids = [];
        //foreach que recorra las instancias de el array tabla_reservas
        foreach ($tabla_reservas as $reservas) {
            //de cada instancia, recogemos su sesion_id siempre y cuando el
            //user_id de la tabla sesion_user y el id que est?? logeado sean el mismo
            if ($reservas->user_id == $user->id) {
                //guardamos la sesion_id de reservas, cargando el array declarado antes
                array_push($sesionids, $reservas->sesion_id);
            }
        }

        //OBTENER LAS SESIONES A PARTIR DEL ARRAY ANTERIOR

        //declaramos variable fuera del for
        $sesiones_usuario = [];

        //for recorriendo los valores obtenidos en el array sesionids
        for ($i = 0; $i < count($sesionids); $i++) {
            //cargamos el array anterior con objetos sesion buscandolos por su id
            array_push($sesiones_usuario, Sesion::find($sesionids[$i]));
        }

        return view('users.show', ['users' => $user, 'sesiones_usuario' => $sesiones_usuario, 'activities' => $actividad, 'rolusuario' => $rolsito]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->fill($request->all());
        $user->save();
        return redirect('/users');
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
