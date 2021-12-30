@extends('layout', ['title' => 'Euskadiko lan egutegiaren APIa', 'lang' => 'eu'])
@section('content')
        <h1>Euskadiko lan egutegiaren APIa</h1>
        <p>Webgune honetan Euskal Autonomia Erkidegoaren lan egutegiaren API Rest bat duzu eskuragarri. Honen erabilera librea eta doakoa da. Erabilgarria bazaizu, inolako konpromisorik gabe erabil dezakezu.</p>
        <p>Datuen jatorria <a href="https://opendata.euskadi.eus/datu-katalogoa/?r01kQry=tC:euskadi;tT:ds_eventos;m:documentLanguage.EQ.eu,OpendataEstadistic.IN.(0,1);mO:documentName.LIKE.lan%20egutegia,documentDescription.LIKE.calendario%20laboral,OpendataLabels.LIKE.calendario%20laboral;pp:r01PageSize.10;p:Inter_portal,Inter&r01SearchEngine=meta">Open Data Euskadiko lan egutegien datu multzoak</a> dira, Eusko Jaurlaritzaren datu irekien atarian daudenak. APIak 2014tik ematen ditu datuak eta urtero eguneratzen dut azaroa/abendua inguruan.</p>
        <a class="button-81" href="/api/documentation" role="button" title="edukia ingelesez dago">APIaren dokumentazioa</a><a class="button-81" href="mailto:alguacilin@gmail.com" role="button">Garatzailearekin harremanetan jarri</a>
@endsection
<!-- HTML !-->
