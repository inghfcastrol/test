<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = "estados";

    protected $fillable = [
    	'nombre_estado',
    	'texto_estado'
    ];

    public function entidadesEstados() {
    	return $this->hasMany('App\EntidadEstado');
    }
}
