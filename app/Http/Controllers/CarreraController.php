<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrera = Carrera::paginate(5);
        return view('admin.admin_carreras', ['carreras' => $carrera]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.registrar_carrera');
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
            'abreviatura' => 'required|alpha|max:6|unique:carreras,abreviatura',
            'carrera' => 'required|unique:carreras,carrera'
        ]);


        $data = request();
        DB::table('carreras')->insert([
            'abreviatura' => $data['abreviatura'],
            'carrera' => $data['carrera']
        ]);

        return redirect()->action([CarreraController::class, 'index']);

        return back()->withErrors(['nombre' => 'Ya hay una carrera con ese nombre.'])
            ->withInput(request(['nombre', 'abreviatura']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera, $id)
    {
        $carrera = $carrera::find($id);
        return view('admin.edicion_carrera', ['carrera' => $carrera]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {
        $abreviaturaNueva = $request->input('abreviatura');
        $nombreNuevo = $request->input('nombre');
        $carrera = $carrera::find($request->id);
        $carreraId = $carrera->id;
        

        
        DB::table('carreras')
            ->where('id', $carreraId)
            ->update([
                'abreviatura' => $abreviaturaNueva,
                'carrera' => $nombreNuevo
            ]);

        return redirect()->action([CarreraController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera, $id)
    {
        $carreras = $carrera::find($id);

        $carreras->delete();

        return redirect()->action([CarreraController::class, 'index']);
    }
}
