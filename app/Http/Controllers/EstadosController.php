<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;

class EstadosController extends Controller
{
    // CONSTRUCTOR DEL CONTROLADOR
    public function __construct()
    {
        // $this->middleware('auth');
    }

    // FUNCION PARA VER EL LISTADO DE LOS ESTADOS
    public function index() {
    	$estados = Estado::all();
    	return view('estados.list')->with([
    		'estados' => $estados
    	]);
    }

    // FUNCION PARA GAURDAR UN NUEVO ESTADO
    public function store(Request $request) {
    	if($request->nombre_estado == null) {
            flash('Ingrese un estado')->error();
            return back()->withInput();
        } elseif($request->texto_estado == null) {
            flash('Ingrese un estado')->error();
            return back()->withInput();
        } elseif($this->existeNombreEstado($request->nombre_estado, 0)) {
            flash('El estado ya se encuentra registrado')->error();
            return back()->withInput();
        } elseif($this->existeTextoEstado($request->texto_estado, 0)) {
            flash('El texto del estado ya se encuentra registrado')->error();
            return back()->withInput();
        } else {
        	$estado = new Estado;
            $estado->nombre_estado = $request->nombre_estado;
            $estado->texto_estado = $request->texto_estado;
            $estado->save();
            flash('Estado creado satisfactoriamente')->success();
            return redirect()->route('estados.index');
        }
    }

    // FUNCION PARA VER EL DETALLE DE UN ESTADO
    public function show($id) {
        $estado = Estado::find($id);
        if($estado) {
            return view('estados.show')->with([
                'estado' => $estado
            ]);            
        } else {
            return view('errores.404');
        }
    }

    // FUNCION PARA GUARDAR LA ACTUALIZACIÓN DE UN ESTADO
    public function update(Request $request, $id) {
        $estado = Estado::find($id);
        if($estado) {
           if($request->nombre_estado == null) {
                flash('Ingrese un estado')->error();
                return back()->withInput();
            } elseif($request->texto_estado == null) {
                flash('Ingrese un estado')->error();
                return back()->withInput();
            } elseif($this->existeNombreEstado($request->nombre_estado, $estado->id)) {
                flash('El estado ya se encuentra registrado')->error();
                return back()->withInput();
            } elseif($this->existeTextoEstado($request->texto_estado, $estado->id)) {
                flash('El texto del estado ya se encuentra registrado')->error();
                return back()->withInput();
            } else {
                $estado->nombre_estado = $request->nombre_estado;  //SOLO SE GUARDAN LOS CAMBIOS HECHOS EN EL NOMBRE DEL ESTADO; EL TEXTO DEL ESTADO NO SE GUARDA
                $estado->save();
                flash('Estado actualizado satisfactoriamente')->success();
                return redirect()->route('estados.show', $estado->id);
            }
        } else {
            return view('errores.404');
        }
    }

    // FUNCION PARA VALIDAR SI EL NOMBRE DE UN ESTADO YA SE ENCUENTRA REGISTRADO 
    public function existeNombreEstado($nombreEstado, $idEstado) {
        $existe = false;
        $estado = Estado::where('nombre_estado', '=', $nombreEstado)->where('id', '!=', $idEstado)->get();
        if(count($estado) > 0) {
            $existe = true;
        }
        return $existe;
    }

    // FUNCION PARA VALIDAR SI EL TEXTO DE UN ESTADO YA SE ENCUENTRA REGISTRADO 
    public function existeTextoEstado($textoEstado, $idEstado) {
        $existe = false;
        $estado = Estado::where('texto_estado', '=', $textoEstado)->where('id', '!=', $idEstado)->get();
        if(count($estado) > 0) {
            $existe = true;
        }
        return $existe;
    }
}
