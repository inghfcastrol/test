<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entidad;
use App\Estado;
use App\EntidadEstado;

class EntidadesController extends Controller
{
    // CONSTRUCTOR DEL CONTROLADOR
    public function __construct()
    {
        // $this->middleware('auth');
    }

    // FUNCION PARA VER EL LISTADO DE LAS ENTIDADES
    public function index() {
    	$estadosIniciales = Estado::all();
    	$entidades = Entidad::all();
    	return view('entidades.list')->with([
    		'estadosIniciales' => $estadosIniciales,
    		'entidades' => $entidades
    	]);
    }

    // FUNCION PARA GAURDAR UNA NUEVA ENTIDAD CON SUS RESPECTIVOS ESTADOS INICIALES 
    public function store(Request $request) {
    	// dd($request->all());
    	if($request->nombre_entidad == null) {
            flash('Ingrese una entidad')->error();
            return back()->withInput();
        } elseif($request->texto_entidad == null) {
            flash('Ingrese una entidad')->error();
            return back()->withInput();
        } elseif($this->existeNombreEntidad($request->nombre_entidad, 0)) {
            flash('La entidad ya se encuentra registrada')->error();
            return back()->withInput();
        } elseif($this->existeTextoEntidad($request->texto_entidad, 0)) {
            flash('El texto de la entidad ya se encuentra registrada')->error();
            return back()->withInput();
        } elseif($request->estadosIniciales == null) {
            flash('Seleccione al menos un estado para la nueva entidad')->error();
            return back()->withInput();
        } else {
        	// dd($request->all());
            $entidad = new Entidad;
            $entidad->nombre_entidad = $request->nombre_entidad;
            $entidad->texto_entidad = $request->texto_entidad;
            $entidad->save();
            foreach ($request->estadosIniciales as $estado) {
                $entidadEstado = new EntidadEstado;
                $entidadEstado->entidad_id = $entidad->id;
                $entidadEstado->estado_id = (int)$estado;
                $entidadEstado->en_uso = 1;
                $entidadEstado->numero_ordenamiento = 0;
                $entidadEstado->save();
            }
            flash('Entidad creada satisfactoriamente')->success();
            return redirect()->route('entidades.index');
        }
    }

    // FUNCION PARA VER EL DETALLE DE UNA ENTIDAD
    public function show($id) {
        $entidad = Entidad::find($id);
        if($entidad) {
            $estadosEntidad = EntidadEstado::where('entidad_id', '=', $entidad->id)->where('en_uso', '=', 1)->orderBy('numero_ordenamiento', 'ASC')->get();
            $estadosIniciales = Estado::all();
            $estadosSeleccionados = [];
            foreach($estadosEntidad as $estadoEntidad) {
                array_push($estadosSeleccionados, $estadoEntidad->estado_id);
            }
            return view('entidades.show')->with([
                'entidad' => $entidad,
                'estadosEntidad' => $estadosEntidad,
                'estadosIniciales' => $estadosIniciales,
                'estadosSeleccionados' => $estadosSeleccionados,
            ]);
        } else {
            return view('errores.404');
        }
    }

    // FUNCION PARA ASIGNAR EL ORDEN DE LOS ESTADOS QUE PERTENECEN A UNA ENTIDAD
    public function ordenarEstados(Request $request) {
        // dd($request->all());
        $entidadesEstadosActivos = EntidadEstado::whereIn('id', $request->estados_entidades_ids)->update(['numero_ordenamiento' => 0]);
        for($yy = 0; $yy < count($request->estados_entidades_ids); $yy++ ) {
            $estadoEntidad = EntidadEstado::find((int)$request->estados_entidades_ids[$yy]);
            $estadoEntidad->numero_ordenamiento = (int)$request->numero_ordenamiento[$yy];
            $estadoEntidad->save();
        }
        flash('Estados ordenados')->success();
        return redirect()->route('entidades.show', $request->id_entidad);
    }

    // FUNCION PARA GUARDAR LA ACTUALIZACIÓN DE UNA ENTIDAD
    public function update(Request $request, $id) {
        // dd($request->all());
        $entidad = Entidad::find($id);
        if($entidad) {
            if($request->nombre_entidad == null) {
                flash('Ingrese una entidad')->error();
                return back()->withInput();
            } elseif($request->texto_entidad == null) {
                flash('Ingrese una entidad')->error();
                return back()->withInput();
            } elseif($this->existeNombreEntidad($request->nombre_entidad, $entidad->id)) {
                flash('La entidad ya se encuentra registrada')->error();
                return back()->withInput();
            } elseif($this->existeTextoEntidad($request->texto_entidad, $entidad->id)) {
                flash('El texto de la entidad ya se encuentra registrada')->error();
                return back()->withInput();
            } elseif($request->nuevosEstados == null) {
                flash('Seleccione al menos un estado para la nueva entidad')->error();
                return back()->withInput();
            } else {
            	// dd($request->all());
                $entidad->nombre_entidad = $request->nombre_entidad;
                $entidad->save();
                $entidadesEstadosActivos = EntidadEstado::where('entidad_id', '=', $entidad->id)->update(['en_uso' => 0]);
                foreach ($request->nuevosEstados as $nuevoEstado) {
                    $entidadEstado = EntidadEstado::where('entidad_id', '=', $entidad->id)->where('estado_id', '=', $nuevoEstado)->first();
                    if($entidadEstado) {
                        $entidadEstado->update(['en_uso' => 1]);
                    } else {
                        $entidadEstado = new EntidadEstado;
                        $entidadEstado->entidad_id = $entidad->id;
                        $entidadEstado->estado_id = (int)$nuevoEstado;
                        $entidadEstado->en_uso = 1;
                        $entidadEstado->numero_ordenamiento = 999;
                        $entidadEstado->save();
                    }
                }
                flash('Entidad actualizada satisfactoriamente')->success();
                return redirect()->route('entidades.show', $entidad->id);
            }
        } else {
            return view('errores.404');
        }
    }

    // FUNCION PARA VALIDAR SI EL NOMBRE DE UNA ENTIDAD YA SE ENCUENTRA REGISTRADA 
    public function existeNombreEntidad($nombreEntidad, $idEntidad) {
        $existe = false;
        $entidad = Entidad::where('nombre_entidad', '=', $nombreEntidad)->where('id', '!=', $idEntidad)->get();
        if(count($entidad) > 0) {
            $existe = true;
        }
        return $existe;
    }

    // FUNCION PARA VALIDAR SI EL TEXTO DE UNA ENTIDAD YA SE ENCUENTRA REGISTRADA
    public function existeTextoEntidad($textoEntidad, $idEntidad) {
        $existe = false;
        $entidad = Entidad::where('texto_entidad', '=', $textoEntidad)->where('id', '!=', $idEntidad)->get();
        if(count($entidad) > 0) {
            $existe = true;
        }
        return $existe;
    }
}
