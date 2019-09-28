@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body" id="formulario"></div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Encuestas</div>
                <div class="card-body">
                    <table class="table" id="table"></table>
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
    var routeBase   = '{!! url("") !!}';
    var contenedor  = $('#formulario');
    var table       = $('#table');    
    var opciones = [{'valor':'EXCELENTE', 'descripcion':'EXCELENTE'},
                    {'valor':'BUENA', 'descripcion':'BUENA'},
                    {'valor':'REGULAR', 'descripcion':'REGULAR'},
                    {'valor':'MALA', 'descripcion':'MALA'}];

    var catTramites = [{'valor':'ACTA DE HECHOS', 'descripcion':'ACTA DE HECHOS'},
                    {'valor':'MECANISMOS ALTERNATIVO', 'descripcion':'MECANISMOS ALTERNATIVO'},
                    {'valor':'ORIENTACIÓN', 'descripcion':'ORIENTACIÓN'},
                    {'valor':'SEGUIMIENTO', 'descripcion':'SEGUIMIENTO'}];                    

    
    formulario = function(){
        contenedor.empty();
        $.when( 
            $.ajax( routeBase+'/api/catalogos/servidores_publicos' ),
            $.ajax( routeBase+'/api/catalogos/tipos_servidores_publicos/1' ),
                
        )
        .done(function( data1, data2 ) {
            let catServidores       = data1[0];
            let catTiposServidores  = data2[0]
            campos = [
                {campo:'input',idCampo:'fecha_registro',nameCampo:'Fecha:',typeCampo:'text',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: '', defaultOption: false},
                {campo:'select',idCampo:'recepcion_atencion',nameCampo:'La atención en el área de recepción fue:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: opciones, defaultOption: false},
                {campo:'select',idCampo:'recepcion_tiempo_espera',nameCampo:'El tiempo de espera fue:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: opciones, defaultOption: false},
                {campo:'select',idCampo:'tramite_realizado',nameCampo:'Trámite realizado:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: catTramites, defaultOption: false},
                {campo:'select',idCampo:'id_servidor_publico',nameCampo:'Servidor publico que lo atendió:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: catServidores, defaultOption: false},
                {campo:'select',idCampo:'id_tipo_servidor_publico',nameCampo:'',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: catTiposServidores, defaultOption: false},
                {campo:'select',idCampo:'servidor_atencion',nameCampo:'La atención recibida fue:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: opciones, defaultOption: false},
                {campo:'select',idCampo:'servidor_tiempo_atencion',nameCampo:'El tiempo en la atención fue:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: opciones, defaultOption: false},
                {campo:'textarea',idCampo:'observaciones',nameCampo:'Observaciones y/o sugerencias:',typeCampo:'',valorCampo: '', placeholder:'',newClass:'',divSize:'12',datos: '', defaultOption: false},
            ];
            
            contenedor.append(estilo_modal.mostrar(campos));
            contenedor.append('<button type="button" class="btn btn-primary btn-lg btn-block" id="btnGuardar">Agregar</button>');
            $("#fecha_registro").mask("00/00/0000", {placeholder: "DD/MM/AAAA"});
            $("#fecha_registro").focus();
        })
    }

    $('body').on('change', '#id_servidor_publico', function(e){
        let id = $(this).val();
        $.get( routeBase+'/api/catalogos/tipos_servidores_publicos/'+id )
		.done(function( data ) {
            html = "";
            $.each( data, function( key, value ) {
                html += '<option value="'+value.valor+'" >'+value.descripcion+'</option>';
            });
            $('#id_tipo_servidor_publico').empty();
			$('#id_tipo_servidor_publico').append(html);
		});
    })


    $('body').on('click', '#btnGuardar', function(){
        //HoldOn.open(optionsHoldOn);
        //footerModal.empty();
        //footerModal.append(btnSpiner());

        var dataString = {
            fecha_registro: $("#fecha_registro").val(),
            recepcion_atencion: $("#recepcion_atencion").val(),
            recepcion_tiempo_espera: $('#recepcion_tiempo_espera').val(),
            tramite_realizado: $("#tramite_realizado").val(),
            id_servidor_publico: $("#id_servidor_publico").val(),
            id_tipo_servidor_publico: $("#id_tipo_servidor_publico").val(),
            servidor_atencion: $("#servidor_atencion").val(),
            servidor_tiempo_atencion: $("#servidor_tiempo_atencion").val(),
            observaciones: ($("#observaciones").val() == undefined)? '' : $("#observaciones").val(),
        }
        
        $.ajax({
            type: 'POST',
            url: routeBase+'/encuesta',
            data: dataString,
            dataType: 'json',
            success: function(data) {
                table.bootstrapTable('refresh');
                formulario();
            },
            error: function(data) {
                var errors = data.responseJSON;
                /*messageToastr('error', errors.message);	
                $('.modal-body div.has-error').removeClass('has-error');
                $('.help-block').empty();
                $.each(errors.errors, function(key, value){					
                    $('#div_'+key).addClass('has-error');
                    $('input#'+key).addClass('form-control-danger');
                    $('#error_'+key).append(value);						
                });
                footerModal.empty();
                footerModal.append(btnModal('btnGuardarConsulta', 'Guardar'));
                HoldOn.close();*/
            }
        });
    })
    
    // Cargando el formulario
    formulario();
    table.bootstrapTable({
        locale: 'es-MX',
        search: true,
        pagination: true,
        pageList: [5, 10, 25, 50],
        pageSize: 10,
        url: routeBase+'/encuesta/get_encuestas',
        columns: [{					
            field: 'fecha_registro',
            title: 'Fecha registro',
        }, {					
            field: 'recepcion_atencion',
            title: 'Atención',
        }, {					
            field: 'recepcion_tiempo_espera',
            title: 'Tiempo espera',
        }, {					
            field: 'tramite_realizado',
            title: 'Tramite',
        }, {					
            field: 'id_servidor_publico',
            title: 'Servidor publico',
        }, {					
            field: 'id_tipo_servidor_publico',
            title: 'Tipo',
        }, {					
            field: 'servidor_atencion',
            title: 'Atencion',
        }, {					
            field: 'servidor_tiempo_atencion',
            title: 'Tiempo de atencion',
        }, {					
            field: 'observaciones',
            title: 'Observaciones',
        }]
    })

    
})
</script>
@endsection
