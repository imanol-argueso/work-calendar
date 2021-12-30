@extends('layout')
@section('content')
        <h1>Festivos del Calendario laboral de Euskadi</h1>
        <table>
        <tr>
            <th>FECHA</th>
            <th>NOMBRE</th>
            <th>CÓDIGO MUNICIPIO</th>
            <th>NOMBRE MUNICIPIO</th>
            <th>CÓDIGO TERRITORIO</th>
            <th>NOMBRE TERRITORIO</th>
        </tr>
        @foreach ($festivities as $festivity)
        <tr>
            <td>{{ $festivity->festivity_date }}</td>
            <td>{{ $festivity->festivity_name_es }}</td>
            <td>{{ $festivity->municipality_code}}</td>
            <td>{{ $festivity->municipality_name_es}}</td>
            <td>{{ $festivity->territory_code}}</td>
            <td>{{ $festivity->territory_name}}</td>
        </tr>      
        @endforeach
        </table>
@endsection
