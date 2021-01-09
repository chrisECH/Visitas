<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deptos = Departamento::all();
        return view('admin.admin_deptos',['deptos'=>$deptos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.registrar_depto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $nombreDepto = $request->input('nombre');
        
        $depto = DB::table('departamentos')->where('nombre',$nombreDepto)->get();
        if($nombreDepto != null && count($depto) == 0){
            $data = request();
             DB::table('departamentos')->insert([
            'nombre'=> $data['nombre']
            ]);

            return redirect()->action([DepartamentoController::class, 'index']);
        } else{
            echo "ya hay un depto con ese name";
        }
        

        
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento, $id)
    {
        $depto = $departamento::find($id);
        return view('admin.edicion_depto',['depto'=>$depto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamento $departamento)
    {
       $nombreNuevo = $request->input('nombre');
       $depto = $departamento::find($request->id);
       $deptoId = $depto->id;
       $deptoNombre = $depto ->nombre;

        DB::table('departamentos')
       ->where('id',$deptoId)
       ->where('nombre',$deptoNombre)
       ->update(['nombre'=> $nombreNuevo]);

       return redirect()->action([DepartamentoController::class, 'index']);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento,$id)
    {
        $depto = $departamento::find($id);
        
        $depto->delete();

        return redirect()->action([DepartamentoController::class, 'index']);
    }
}
