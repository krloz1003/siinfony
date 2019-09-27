<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatTipoServidorPublico extends Model
{
    protected $table = 'cat_tipo_servidor_publicos';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['id_servidor_publico', 'nombre'];

    public function tipoServidor()
    {
        return $this->belongsTo('App\Models\CatServidorPublico', 'id_servidor_publico');
    }
}
