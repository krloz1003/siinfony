<?php

use Illuminate\Database\Seeder;

class CatServidorPublicoSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servidor = new \App\Models\CatServidorPublico;
        $servidor->nombre = 'ORIENTADOR';
        $servidor->save();

        $tipo = new \App\Models\CatTipoServidorPublico;
        $tipo->id_servidor_publico = $servidor->id;
        $tipo->nombre = 'SEGUNDO';
        $tipo->save();

        $tipo = new \App\Models\CatTipoServidorPublico;
        $tipo->id_servidor_publico = $servidor->id;
        $tipo->nombre = 'TERCERO';
        $tipo->save();

        $tipo = new \App\Models\CatTipoServidorPublico;
        $tipo->id_servidor_publico = $servidor->id;
        $tipo->nombre = 'CUARTO';
        $tipo->save();

        $tipo = new \App\Models\CatTipoServidorPublico;
        $tipo->id_servidor_publico = $servidor->id;
        $tipo->nombre = 'QUINTO';
        $tipo->save();
        
        $tipo = new \App\Models\CatTipoServidorPublico;
        $tipo->id_servidor_publico = $servidor->id;
        $tipo->nombre = 'SEXTO';
        $tipo->save();
        
        $tipo = new \App\Models\CatTipoServidorPublico;
        $tipo->id_servidor_publico = $servidor->id;
        $tipo->nombre = 'SÉPTIMO';
        $tipo->save();
        
        $tipo = new \App\Models\CatTipoServidorPublico;
        $tipo->id_servidor_publico = $servidor->id;
        $tipo->nombre = 'NOVENO';
        $tipo->save();

        $servidor = new \App\Models\CatServidorPublico;
        $servidor->nombre = 'FACILITADOR';
        $servidor->save();

        $tipo = new \App\Models\CatTipoServidorPublico;
        $tipo->id_servidor_publico = $servidor->id;
        $tipo->nombre = 'PRIMERA';
        $tipo->save();

        $tipo = new \App\Models\CatTipoServidorPublico;
        $tipo->id_servidor_publico = $servidor->id;
        $tipo->nombre = 'SEGUNDA';
        $tipo->save();

        $tipo = new \App\Models\CatTipoServidorPublico;
        $tipo->id_servidor_publico = $servidor->id;
        $tipo->nombre = 'CUARTA';
        $tipo->save();

        $servidor = new \App\Models\CatServidorPublico;
        $servidor->nombre = 'SEGUIMIENTO';
        $servidor->save();

        $tipo = new \App\Models\CatTipoServidorPublico;
        $tipo->id_servidor_publico = $servidor->id;
        $tipo->nombre = 'ANALISTA ADMINISTRATIVO';
        $tipo->save();

    }
}
