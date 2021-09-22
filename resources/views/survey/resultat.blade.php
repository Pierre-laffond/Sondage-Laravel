
@extends('layouts/layout')

@section('home')

  @if($resultat)
<h1>RESULTATS DES SURVEYS CLOTURé</h1>
@foreach($resultat as $result)
    @php
  $date = $current_date = date('Y-m-d');
    @endphp
  @if($date>$result[0]->date_fin)

    <div class="container bg-light">

    <h2><a class="nav-link" href="survey/{{$result[0]->id}}"> pour le survey numero : {{$result[0]->id}}</a></h2>
    <p>date debut : {{$result[0]->date_debut}} date fin : {{$result[0]->date_fin}} </p>
    <p>Lien de projet<a href="{{$result[0]->projet->file}}">{{$result[0]->projet->description}} </a> </p>
    <h2>Resultat de vote {{$result[0]->resultat}} %</h2>
    <p>Vote Pour : {{$result[1]}} Vote contre : {{$result[2]}}</p>

    </div>
    <br>
    @endif
    @endforeach


<h1>RESULTATS DES SURVEYS ENCOURS</h1>
@foreach($resultat as $result)
    @php
        $date = $current_date = date('Y-m-d');
    @endphp
    @if($date<=$result[0]->date_fin)

        <div class="container bg-light">

            <h2><a class="nav-link" href="survey/{{$result[0]->id}}"> pour le survey numero : {{$result[0]->id}}</a></h2>
            <p>date debut : {{$result[0]->date_debut}} date fin : {{$result[0]->date_fin}} </p>
            <p>Lien de projet<a href="{{$result[0]->projet->file}}">{{$result[0]->projet->description}} </a> </p>
            <h2>Resultat de vote {{$result[0]->resultat}} %</h2>
            <p>Vote Pour : {{$result[1]}} Vote contre : {{$result[2]}}</p>

        </div>
        <br>
    @endif
@endforeach
    @endif
@endsection

