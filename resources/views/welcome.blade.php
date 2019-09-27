@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4" id="formulario">

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Encuesta</div>
                <div class="card-body">
                    <div class="col-4">Formulario</div>
                    <div class="col-8">Listado</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
$(function(){
    console.log('Preparando el fomulario');
    var routeBase  = '{!! url("") !!}';
    var contenedor = $('#formulario');
    var opciones = [{'valor':'EXCELENTE', 'descripcion':'EXCELENTE'},
                    {'valor':'BUENA', 'descripcion':'BUENA'},
                    {'valor':'REGULAR', 'descripcion':'REGULAR'},
                    {'valor':'MALA', 'descripcion':'MALA'}];

    $.when( 
		$.ajax( routeBase+'/api/catalogos/servidores_publicos' ),
		$.ajax( routeBase+'/api/catalogos/tipos_servidores_publicos' ),
			
    )
    .done(function( data1, data2 ) {
        let catServidores       = data1[0];
        let catTiposServidores  = data2[0]
        campos = [
            {campo:'input',idCampo:'fecha_registro',nameCampo:'Fecha:',typeCampo:'text',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: '', defaultOption: false},
            {campo:'select',idCampo:'recepcion_atencion',nameCampo:'La atención en el área de recepción fue:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: opciones, defaultOption: false},
            {campo:'select',idCampo:'recepcion_tiempo_espera',nameCampo:'El tiempo de espera fue:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: opciones, defaultOption: false},
            {campo:'select',idCampo:'tramite_realizado',nameCampo:'Trámite realizado:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: '', defaultOption: false},
            {campo:'select',idCampo:'id_servidor_publico',nameCampo:'Servidor publico que lo atendió:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: '', defaultOption: false},
            {campo:'select',idCampo:'id_tipo_servidor_publico',nameCampo:'',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: '', defaultOption: false},
            {campo:'select',idCampo:'servidor_atencion',nameCampo:'La atención recibida fue:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: opciones, defaultOption: false},
            {campo:'select',idCampo:'servidor_tiempo_atencion',nameCampo:'El tiempo en la atención fue:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: opciones, defaultOption: false},
            {campo:'input',idCampo:'observaciones',nameCampo:'Observaciones y/o sugerencias:',typeCampo:'textarea',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: '', defaultOption: false},
        ];
        
        contenedor.append(estilo_modal.mostrar(campos));
        $("#fecha_registro").mask("00/00/0000", {placeholder: "DD/MM/AAAA"});
        $("#fecha_registro").focus();
    })
    
})
</script>
@endsection
