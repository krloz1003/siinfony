<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}