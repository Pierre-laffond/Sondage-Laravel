
@extends('layouts/layout')

@section('home')

        <div class="container">
    @php
     $vouter= session()->get('vouter');
     $partie=session()->get('partie');
     if(session()->has('surveys')){
     $surveys=session()->get('surveys');

    }
    if(session()->has('voted_surveys')){
    $voted_surveys= session('voted_surveys');
    }


    @endphp



            <div class="row justify-conten-between ml-0">
                <div class="col-3">
                    <h2>About Me</h2>
                    <h5>Photo of me:</h5>
                    <div class="fakeimg">Fake Image</div>


                    <p>Lorem ipsum dolor sit ame.</p>
                    <ul class="nav nav-pills flex-column">
                        <li class=" nav-item bg-success">{{$vouter->first_name}}</li>
                        <li  class=" nav-item bg-success">{{$vouter->last_name}}</li>
                        <li  class=" nav-item bg-success">{{$vouter->email}}</li>

                        <li  class=" nav-item bg-success">{{$vouter->birthdate}}</li>
                        <li  class=" nav-item bg-success">{{$partie->name}}</li>
                        <li>{{date('Y-m-d')}}</li>
                    </ul>
                    <hr class="d-sm-none">
                </div>
                <div class="col-5">
                    <h2>Available surveys</h2>
                    <ul class="nav nav-pills flex-column">
                        @if($surveys)

                    @foreach($surveys as $survey)

                        <li class="'nav-item">
                            <a class="nav-link" href="survey/{{$survey->id}}">
                            {{$survey->date_debut}}/{{$survey->date_fin}}
                            {{$survey->projet->description}}
                            </a>
                        </li>


                    @endforeach

                            @endif
                    </ul>

                </div>
                <div class="col-4">
                    @if($voted_surveys)
                        <h2>Voted surveys</h2>
                        @foreach($voted_surveys as $survey)

                            <li class="'nav-item">
                                <a class="nav-link" href="survey/{{$survey->id}}">
                                    {{$survey->date_debut}}/{{$survey->date_fin}}
                                    {{$survey->projet->description}}
                                </a>
                            </li>


                        @endforeach

                    @endif

                </div>

            </div>


</div>

@endsection

