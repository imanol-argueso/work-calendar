@extends('layout', ['title' => 'API del calendario laboral de Euskadi', 'lang' => 'es'])
@section('content')
        <h1>API del calendario laboral de Euskadi</h1>
        <p>Este sitio web ofrece un API Rest del calendario laboral de la Comunidad Autónoma de Euskadi. Su uso es libre y gratuito. Si te resulta de utilidad puedes utilizarlo sin ningún compromiso.</p>
        <p>Los datos se obtienen de los <a href="https://opendata.euskadi.eus/catalogo-datos/?r01kQry=tC:euskadi;tT:ds_eventos;m:documentLanguage.EQ.es,OpendataEstadistic.IN.(0,1);mO:documentName.LIKE.calendario%20laboral,documentDescription.LIKE.calendario%20laboral,OpendataLabels.LIKE.calendario%20laboral;pp:r01PageSize.10;p:Inter_portal,Inter&r01SearchEngine=meta">datasets del calendario laboral de Open Data Euskadi</a>, el portal de datos abiertos del Gobierno Vasco. Este API ofrece datos desde el año 2014 y lo actualizo anualmente en torno a noviembre/diciembre.</p>
        <a class="button-81" href="/api/documentation" role="button" title="el contenido está en inglés">Documentación del API</a><a class="button-81" href="mailto:alguacilin@gmail.com" role="button">Contactar con el desarrollador</a>
@endsection
<!-- HTML !-->
