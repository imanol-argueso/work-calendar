@extends('layout')
@section('content')
        <h1>Municipios de la Comunidad Autónoma de Euskadi</h1>
        <table>
        <tr>
            <th>CÓDIGO MUNICIPIO</th>
            <th>NOMBRE MUNICIPIO</th>
            <th>CÓDIGO TERRITORIO</th>
            <th>NOMBRE TERRITORIO</th>
            <th>LATITUD (WGS 84)</th>
            <th>LONGITUD (WGS 84)</th>
        </tr>
        @foreach ($municipalities as $municipality)
        <tr>
            <td>{{ $municipality->municipality_code }}</td>
            <td>{{ $municipality->municipality_name_es }}</td>
            <td>{{ $municipality->territory_code }}</td>
            <td>{{ $municipality->territory_name }}</td>
            <td>{{ $municipality->latwgs84 }}</td>
            <td>{{ $municipality->lonwgs84 }}</td>
        </tr>      
        @endforeach
        </table>
@endsection
