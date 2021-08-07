<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    protected $table = "entidades";

    protected $fillable = [
    	'nombre_entidad',
    	'texto_entidad'
    ];

    public function entidadesEstados() {
    	return $this->hasMany('App\EntidadEstado');
    }
}
