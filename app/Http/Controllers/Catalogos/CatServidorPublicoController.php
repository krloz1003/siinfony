<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatServidorPublicoController extends Controller
{
    public function getCatServidoresPublicos(){
        $datos = \App\Models\CatServidorPublico::select('id as valor', 'nombre as descripcion')->get();
        return response()->json($datos);
    }

    public function getCatTiposServidoresPublicos(Request $request, $id){
        $datos = \App\Models\CatTipoServidorPublico::where('id_servidor_publico', $id)
                            ->select('id as valor', 'nombre as descripcion')
                            ->get();

        return response()->json($datos);
    }
}
