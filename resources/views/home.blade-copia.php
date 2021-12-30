@extends('layout')
@section('content')
        <h1>Calendario laboral de Euskadi</h1>
        <p>Este sitio web ofrece un <strong>API Rest del calendario laboral</strong> de la Comunidad Autónoma de Euskadi desde el año 2014.</p>
        <p>Puedes acceder a la <a href="#">documentación detallada del API</a>, dónde se muestra cómo realizar las peticiones y obtener los datos en formato JSON.</p>
        <p>A modo de resumen, aquí tienes varios ejemplos para que compruebes lo sencillo que es utilizar el API y obtener los datos:</p>
        <h2>Festivos por fecha</h2>
        <p>Varios ejemplos de cómo obtener los festivos por fecha:</p>
        <dl>
            <dt>Todos los festivos de Euskadi del 2022:</dt>
            <dd>/api/v1/festivities/bydate/{year} -> <a href="http://127.0.0.1:8000/api/v1/festivities/bydate/2022" target="_blank">/api/v1/festivities/bydate/2022</a></dd>

            <dt>Todos los festivos de Euskadi de junio de 2022:</dt> 
            <dd>/api/v1/festivities/bydate/{year}/{month} -> <a href="http://127.0.0.1:8000/api/v1/festivities/bydate/2022/6" target="_blank">/api/v1/festivities/bydate/2022/6</a></dd>
            <dt>Todos los festivos de Euskadi del 24 de junio de 2022:</dt>
            <dd>/api/v1/festivities/bydate/{year}/{month}/{day} -> <a href="http://127.0.0.1:8000/api/v1/festivities/bydate/2022/6/24" target="_blank">/api/v1/festivities/bydate/2022/6/24</a></dd>
        </dl>
        <h2>Festivos por municipio</h2>
        <p>Varios ejemplos de cómo obtener los festivos por municipio o territorio (provincia):</p>
        <dl>
            <dt>Todos los festivos de Zarautz del 2022:</dt> 
            <dd>/api/v1/festivities/bylocation/{territory}/{municipality}/bydate/{year} -> <a href="http://127.0.0.1:8000/api/v1/festivities/bylocation/20/20079/bydate/2022" target="_blank">/api/v1/festivities/bylocation/20/20079/bydate/2022</a></dd>
            <dt>Todos los festivos de Araba de 2022:</dt> 
            <dd>/api/v1/festivities/bylocation/{territory}/bydate/{year} -> <a href="http://127.0.0.1:8000/api/v1/festivities/bylocation/01/bydate/2022" target="_blank">/api/v1/festivities/bylocation/01/bydate/2022</a></dd>
            <dt>Todos los festivos de Euskadi de 2022:</dt> 
            <dd>/api/v1/festivities/bylocation/bydate/{year} -> <a href="http://127.0.0.1:8000/api/v1/festivities/bylocation/bydate/2022" target="_blank">/api/v1/festivities/bylocation/bydate/2022</a></dd>
        </dl>
        <h2>Localizaciones</h2>
        <p>Varios ejemplos de cómo obtener los municipios y territorios (provincias):</p>
        <dl>
            <dt>Todos los municipios de Euskadi:</dt> 
            <dd>/api/v1/municipalities -> <a href="http://127.0.0.1:8000/api/v1/municipalities" target="_blank">/api/v1/municipalities</a></dd>
            <dt>Todos los territorios de Euskadi:</dt> 
            <dd>/api/v1/territories -> <a href="http://127.0.0.1:8000/api/v1/territories" target="_blank">/api/v1/territories</a></dd>
        </dl>
@endsection
