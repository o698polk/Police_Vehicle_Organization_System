<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'EDITAR SUBCIRCUITOS')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->


@section('content')
<br><br><br><br><br><br>
<style>
   body {
        font-family: "Arial", sans-serif;
        margin: 0;
        padding: 0;
    }
    .cvt {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        color: black;
    }

    .section-containert {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
    }

    .section-titlet {
        font-size: 20px;
        background-color: #333;
        color: white;
        padding: 5px;
        margin: 0;
    }

    .section-contentt {
        padding: 10px;
    }

    .gray-backgroundt {
        background-color: #eee;
    }

    .font-businesst {
        font-family: "Your-Font-Here", sans-serif; /* Reemplaza "Your-Font-Here" con la fuente que desees */
    }
</style>

<!--<button id="capturaButton" class="btn btn-primary">FINALIZAR</button>--->

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script>
    document.getElementById('capturaButton').addEventListener('click', function () {
        var cvContent = document.querySelector('.cvt');
        
        // Usar html2canvas para capturar la captura de pantalla
        html2canvas(cvContent).then(function(canvas) {
            // Convertir el lienzo en una imagen
            var imgData = canvas.toDataURL('image/png');
            
            // Crear un elemento de imagen y mostrar la captura en una ventana emergente
            var img = new Image();
            img.src = imgData;
            
            var popup = window.open('', '_blank');
            popup.document.open();
            popup.document.write('<html><head><title>Captura de Pantalla</title></head><body>');
            popup.document.write('<h1>Captura de Pantalla</h1>');
            popup.document.write('<img src="' + imgData + '" />');
            popup.document.write('</body></html>');
            popup.document.close();
            
            // Imprimir la ventana emergente
            popup.print();
        });
    });
</script>

<button id="imprimirButton" class="btn btn-primary">FINALIZAR</button>

<script>
    document.getElementById('imprimirButton').addEventListener('click', function () {
        var cvContent = document.querySelector('#ctvw');
        var newWindow = window.open('', '_blank');
        newWindow.document.open();
        newWindow.document.write('<html><head><title>ORDEN DE TRABAJO Y MANTENIMIENTO </title></head><body>');
        newWindow.document.write('<style>.cv{max-width:800px;margin:0 auto;padding:20px;background-color:white;box-shadow:0 0 10px rgba(0,0,0,0.1);color:black;}.cv *{font-family:"Arial",sans-serif;}.section-container{border:1px solid #ccc;padding:10px;margin-bottom:20px;}.section-title{font-size:20px;background-color:#333;color:white;padding:5px;margin:0;}.section-content{padding:10px;}.gray-background{background-color:#eee;}.font-business{font-family:"Your-Font-Here",sans-serif;}</style>');
        newWindow.document.write('<h1>MANTENIMIENTO</h1>');
        newWindow.document.write(cvContent.innerHTML);
        newWindow.document.write('</body></html>');
        newWindow.document.close();
        newWindow.print();
        newWindow.close();
    });
</script>
@if(session('roles')->codigo_rol >= 0)
<div class="cvt" id="ctvw">
    <div class="section-containert">
        <h2 class="section-titlet font-businesst">ORDEN DE MOVILIZACION</h2>
        <div class="section-contentt">
            <p><strong>Motivo:</strong> {{$matriz['datos']->motivo}}</p>
            <p><strong>Ruta:</strong> {{$matriz['datos']->ruta}}</p>
            <p><strong>Kilometraje Inicial:</strong> {{$matriz['datos']->km_inicial}}</p>

        </div>
    </div>
<div class="section-containert gray-backgroundt">
        <h2 class="section-titlet font-businesst">OCUPANTES DEL VEHICULO</h2>
        <p><strong>Ocupantes:</strong> {{$matriz['datos']->dato_ocupante}}</p>
    </div>

    <div class="section-containert gray-backgroundt">
        <h2 class="section-titlet font-businesst">QUIEN SOLICITA</h2>
        <div class="section-contentt">
            <p><strong>Nombre:</strong> {{$matriz['depen']->personal1['nombre_apellido']}}</p>
            <p><strong>Cédula:</strong> {{$matriz['depen']->personal1['identificacion']}}</p>
            <p><strong>Fecha de la solicitud:</strong> {{$matriz['datos']->created_at}}</p>
        </div>
    </div>

 <div class="section-containert gray-backgroundt">
        <h2 class="section-titlet font-businesst">QUIEN CONDUCE</h2>
        <div class="section-contentt">
            <p><strong>Nombre:</strong> {{$matriz['depen']->personal2['nombre_apellido']}}</p>
            <p><strong>Cédula:</strong> {{$matriz['depen']->personal2['identificacion']}}</p>
            <p><strong>Fecha de la solicitud:</strong> {{$matriz['datos']->created_at}}</p>
        </div>
    </div>
    <div class="section-containert">
        <h2 class="section-titlet font-businesst">VEHÍCULO</h2>
        <div class="section-contentt">
            <p><strong>Tipo:</strong> {{$matriz['depen']->Vehiculo['tipo_vehiculo']}}</p>
            <p><strong>Placa:</strong> {{$matriz['datos']->Vehiculo['placa']}}</p>
            <p><strong>Kilometraje:</strong> {{$matriz['datos']->Vehiculo['kilometraje']}}</p>
        </div>
    </div>


    <div class="section-containert gray-backgroundt">
        <h2 class="section-titlet font-businesst">FECHA DE RETIRO</h2>
        <div class="section-contentt">
            <p><strong>Fecha:</strong> {{$matriz['datos']->updated_at}}</p>
        </div>
    </div>

    <div class="section-containert">
        <h2 class="section-titlet font-businesst">ADMINISTRADOR</h2>
        <div class="section-contentt">
            <p><strong>Nombre:</strong> {{$matriz['datos']->Usuario['nombre_apellido']}}</p>
                <p><strong>Firma:</strong>..................................... </p>
        </div>
    </div>
</div>
@endif
<br><br><br><br><br><br>
@endsection
