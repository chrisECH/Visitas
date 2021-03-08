<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Rol;
use App\Models\Departamento;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deptos = departamento::all();
        $users = DB::table('users')
            ->join('departamentos', 'users.departamento_id', '=', 'departamentos.id')
            ->join('rols', 'users.rol_id', '=', 'rols.id')
            ->select('users.*', 'departamentos.nombre as deptoNombre', 'rols.nombre as rolNombre')
            ->paginate(5);

        return view('admin.admin_users', compact('users','deptos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rols = rol::all();
        $depto = departamento::all();
        return view('admin.registrar_user', ['rols' => $rols, 'depto' => $depto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'            =>     'required|min:2!max:100',
            'apellidop'         =>     'required|alpha|min:2!max:100',
            'apellidom'         =>     'required|alpha|min:2!max:100',
            'telefono'          =>     'required|numeric',
            'mail'              =>     'required|unique:users,email',
            'password'          =>     'required|alpha_num|min:6',
            'password_check'    =>     'required|alpha_num|same:password',
        ], [
            'mail.required'     =>      'El campo correo es obligatorio.',
            'password_check.required'=> 'Confirme la contraseña.'
        ]);

        $data = $request;

        $name_check = $request->nombre;
        $apellidop_check = $request->apellidop;
        $apellidom_check = $request->apellidom;

        $fullname_check = DB::table('users')
            ->where('nombre', $name_check)
            ->where('apellidop', $apellidop_check)
            ->where('apellidom', $apellidom_check)
            ->get();

        if (count($fullname_check) > 0) return redirect()->action([UserController::class, 'index']);
        else {
            DB::table('users')->insert([
                'nombre'     =>    $data['nombre'],
                'apellidop'  =>    $data['apellidop'],
                'apellidom'  =>    $data['apellidom'],
                'telefono'   =>    $data['telefono'],
                'email'      =>    $data['mail'],
                'password'   =>    Hash::make($data['password']),
                'foto'       =>    null,
                'departamento_id'   =>    $data['depto'],
                'rol_id'     =>    $data['rol']
            ]);

            return redirect()->action([UserController::class, 'index']);
        }
    }

    /**
     * Display the specified resource.
     *
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,$id)
    {
        $usuario = $user::find($id);
        $userId = $usuario->id;

        $users = DB::table('users')
            ->join('departamentos', 'users.departamento_id', '=', 'departamentos.id')
            ->join('rols', 'users.rol_id', '=', 'rols.id')
            ->where('users.id',$userId)
            ->select('users.*', 'departamentos.nombre as deptoNombre', 'rols.nombre as rolNombre')
            ->get();
            
            return view('admin.admin_perfil', ['users' => $users]);
    }

    public function showProfesor(User $user,$id){
        $usuario = $user::find($id);
        $userId = $usuario->id;

        $users = DB::table('users')
            ->join('departamentos', 'users.departamento_id', '=', 'departamentos.id')
            ->join('rols', 'users.rol_id', '=', 'rols.id')
            ->where('users.id',$userId)
            ->select('users.*', 'departamentos.nombre as deptoNombre', 'rols.nombre as rolNombre')
            ->get();
            
            return view('profesores.prof_perfil', ['users' => $users]);
    }

   


    /**
     * Show the form for editing the specified resource.
     *
     * 
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        $rols = rol::all();
        $depto = departamento::all();
        $user = $user::find($id);
        //dd($user);
        return view('admin.edicion_user',['user'=>$user, 'rols'=>$rols, 'deptos'=>$depto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = $user::find($request->id);
        $userId = $user->id;
        $nombreAnterior = DB::table('users')
                            ->where('id',$userId)
                            ->value('nombre');

        $apellpAnterior =  DB::table('users')
                            ->where('id',$userId)
                            ->value('apellidop');

        $apellmAnterior =  DB::table('users')
                            ->where('id',$userId)
                            ->value('apellidom');
                            
        dd($nombreAnterior,$apellpAnterior,$apellmAnterior);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $usuario = $user::find($id);
        $usuarioId = $usuario->id;
        $userLog = Auth::user()->id;
        if($usuarioId == $userLog){
            return back();
        }
        $usuario->delete();

        return redirect()->action([UserController::class, 'index']);
    }

    public function actFoto(Request $request){
        $user = Auth::user();

        if($request->hasFile('fotoPerfil')){
            $file = $request->file('fotoPerfil');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/profile-images/',$name);
            $user->foto = $name;
        }

        $user->save();
        return redirect()->action([AdminController::class, 'indexAdmin']);
    }

    public function busqueda(Request $request){
        $users = DB::table('users')
            ->join('departamentos', 'users.depto_id', '=', 'departamentos.id')
            ->join('rols', 'users.rol_id', '=', 'rols.id')
            ->select('users.*', 'departamentos.nombre as deptoNombre', 'rols.nombre as rolNombre')
            ->where([['users.nombre','like','%'.$request->busqueda.'%'],['depto_id',$request->depto]])
            ->paginate(5);
            
            $deptos = Departamento::all();
            return view('admin.admin_users',['users'=>$users, 'deptos'=>$deptos]);
    }
}
