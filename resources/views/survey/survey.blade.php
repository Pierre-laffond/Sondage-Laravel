@extends('layouts/layout')

@section('home')

    @php
    $survey = session()->get('survey');

    @endphp
    <div class="container">

        <div>
            <u><a href="{{$survey->projet->file}}" target="_blank">{{ $survey->projet->description}}</a></u>
            <br><br>
            <p>La sondage est ouvert depuis le {{$survey->date_debut}} et se cloture le {{$survey->date_fin}} </p>


            <p> Etes-vous favorable a cette proposition ?
                <a href='vote/{{$survey->id}}/Pour' class='btn btn-primary'>Pour</a>
                <a href='vote/{{$survey->id}}/Contre' class='btn btn-primary'>Contre</a>
                <br>
            <p>Résultat : {{$survey->resultat}} % </p>
            @if(session('message'))
                <label class='bg-warning'>{{session('message')}}</label>
            @endif

    </div>




@endsection