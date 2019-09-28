<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Encuesta extends Model
{
    protected $table = 'encuestas';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['fecha_registro', 'recepcion_atencion', 'recepcion_tiempo_espera', 'tramite_realizado',
    'id_servidor_publico', 'id_tipo_servidor_publico', 'servidor_atencion',
    'servidor_tiempo_atencion','observaciones'
    ];

    public function servidor()
    {
        return $this->belongsTo('App\Models\CatServidorPublico', 'id_servidor_publico');
    }

    public function tipoServidor()
    {
        return $this->belongsTo('App\Models\CatTipoServidorPublico', 'id_tipo_servidor_publico');
    }

    public function setFechaRegistroAttribute($value)
    {
        if(empty($value)){
            $this->attributes['fecha_registro'] = null;
        } else {
            $this->attributes['fecha_registro'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        }
    }
    
    public function getFechaRegistroAttribute($value)
    {
    	return \Carbon\Carbon::parse($value)->format('d/m/Y');
	}


}