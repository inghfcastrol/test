<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadEstado extends Model
{
    protected $table = "entidades_estados";

    protected $fillable = [
    	'entidad_id', 
    	'estado_id', 
        'en_uso', 
        'numero_ordenamiento'
    ];

    public function entidad() {
    	return $this->belongsTo('App\Entidad');
    }

    public function estado() {
    	return $this->belongsTo('App\Estado');
    }
}
