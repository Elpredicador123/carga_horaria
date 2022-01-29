<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Declaracionjurada;
use App\Periodo;
use App\Cargalectiva;
class DeclaracionjuradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Declaracionjurada::paginate();
        return view("docente.declaracionjurada.index",compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periodos = Periodo::all();
        return view("docente.declaracionjurada.create",compact('periodos'));
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
        $declaracion=Declaracionjurada::create($request->all());
        if($request->hasFile('documento')){
            $file=$request->file('documento');
            $name= time().$file->getClientOriginalName(); // el getClientOriginalName() obtiene el nombre de $file.
            $file->move(public_path().'/declaracionjurada/',$name);
            $declaracion->documento=$name;
       }
       $declaracion->save();
       return redirect()->route('declaracionjurada.index')->with('datos','Declaracion Jurada registrada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Declaracionjurada::find($id);
        $periodos = Periodo::all();
        return view("docente.declaracionjurada.edit",compact('item','periodos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $declaracion=Declaracionjurada::find($id);
        if($request->hasFile('documento')){
            $file=$request->file('documento');
            $name= time().$file->getClientOriginalName(); // el getClientOriginalName() obtiene el nombre de $file.
            $file->move(public_path().'/declaracionjurada/',$name);
            $declaracion->documento=$name;
       }
        $declaracion->update($request->except('documento'));
        if ($declaracion->estado="observado") {
            $declaracion->update(["estado" => "pendiente",]);
        }
       return redirect()->route('declaracionjurada.index')->with('datos','Declaracion Jurada actualizada correctamente');
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

    public function descarga($id)
    {
        $item=Declaracionjurada::find($id);
        $file_path = public_path('declaracionjurada/'.$item->documento); /* Va a la carpeta pública del proyecto */
        return response()->download($file_path);
    }

    public function plantilla()
    {
        $file_path = public_path('plantillas/declaracionjurada.docx'); /* Va a la carpeta pública del proyecto */
        return response()->download($file_path);
    }

    public function listardeclaracionevaluar()
    {
        $items = Declaracionjurada::where('estado_enviado',1)->orWhere('estado','observado')->paginate();
        return view("jefedepartamento.declaracionjurada.index",compact('items'));
    }
    public function editdeclaracionevaluar($id)
    {
        $item=Declaracionjurada::find($id);
        $periodos = Periodo::all();
        return view("jefedepartamento.declaracionjurada.edit",compact('item','periodos'));
    }
    public function updatedeclaracionevaluar(Request $request, $id)
    {
        $declaracionjurada=Declaracionjurada::find($id);
        $declaracionjurada->update($request->all());
        if ($request->estado=="aprobado") {
            Cargalectiva::insert([["declaracionjurada_id" => $declaracionjurada->id,],]);
        }
        if ($request->estado=="observado") {
            $declaracionjurada->update(["estado_enviado" => 0,]);
        }

        return redirect()->route('declaracionjurada.listardeclaracionevaluar')->with('datos','Declaracion Jurada actualizada correctamente');
    }
}
