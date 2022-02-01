<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rol;
use App\Condicion;
use App\Categoria;
use App\Modalidad;
use App\Escuela;
use App\Docente;
use App\Jefedepartamento;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::orderBy('rol_id')->paginate();
        return view("administrador.usuario.index",compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tipo)
    {
        if ($tipo=="docente") {
            $rol = Rol::where('descripcion','docente')->get();
            $condiciones = Condicion::all();
            $categorias = Categoria::all();
            $modalidades = Modalidad::all();
            $escuelas = Escuela::all();
            return view("administrador.usuario.docente.create",compact('rol','condiciones','categorias','modalidades','escuelas'));
        }
        if ($tipo=="jefedepartamento") {
            $rol = Rol::where('descripcion','jefe departamento')->get();
            $escuelas = Escuela::all();
            return view("administrador.usuario.jefedepartamento.create",compact('rol','escuelas'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$tipo)
    {
        $user = User::create([
            "name" => $request->name,
            "dni" => $request->dni,
            "email" => $request->email,
            "rol_id" =>$request->rol_id,
            "password" => \Hash::make($request->dni),
        ]);
        if ($tipo=="docente") {
            Docente::create([
                "user_id" => $user->id,
                "escuela_id" => $request->escuela_id,
                "condicion_id" => $request->condicion_id,
                "categoria_id" =>$request->categoria_id,
                "modalidad_id" =>$request->modalidad_id,
            ]);
        }
        if ($tipo=="jefedepartamento") {
            Jefedepartamento::create([
                "user_id" => $user->id,
                "escuela_id" => $request->escuela_id,
            ]);
        }
        return redirect()->route('usuarios.index')->with('datos','Usuario registrado correctamente');
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
    public function edit($id,$tipo)
    {
        if ($tipo=="docente") {
            $usuario = User::find($id);
            $rol = Rol::where('descripcion','docente')->get();
            $condiciones = Condicion::all();
            $categorias = Categoria::all();
            $modalidades = Modalidad::all();
            $escuelas = Escuela::all();
            return view("administrador.usuario.docente.edit",compact('usuario','rol','condiciones','categorias','modalidades','escuelas'));
        }
        if ($tipo=="jefedepartamento") {
            $usuario = User::find($id);
            $rol = Rol::where('descripcion','jefe departamento')->get();
            $escuelas = Escuela::all();
            return view("administrador.usuario.jefedepartamento.edit",compact('usuario','rol','escuelas'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$tipo)
    {
        $validatedData = $request->validate([
            'dni' => 'digits:8|unique:users,dni,'.$id.'',
        ],[
            'dni.digits' => 'El DNI debe tener 8 digitos',
            'dni.unique' => 'El DNI ya esta Registrado',
        ]);

       User::find($id)->update([
            "name" => $request->name,
            "dni" => $request->dni,
            "email" => $request->email,
            "rol_id" =>$request->rol_id,
            "password" => \Hash::make($request->dni),
        ]);
        if ($tipo=="docente") {
            Docente::find($request->docente_id)->create([
                "user_id" => $id,
                "escuela_id" => $request->escuela_id,
                "condicion_id" => $request->condicion_id,
                "categoria_id" =>$request->categoria_id,
                "modalidad_id" =>$request->modalidad_id,
            ]);
        }
        if ($tipo=="jefedepartamento") {
            Jefedepartamento::find($request->jefedepartamento_id)->create([
                "user_id" => $id,
                "escuela_id" => $request->escuela_id,
            ]);
        }
        return redirect()->route('usuarios.index')->with('datos','Usuario actualizado correctamente');
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
