<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatServidorPublico extends Model
{
    protected $table = 'cat_servidor_publicos';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['nombre'];
}
