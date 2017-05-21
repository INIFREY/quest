@extends('layouts.app')

@section('content')
    <div class="container quest">

        <div class="row">

            <div class="col m8 s12">
                <div class="card">
                    <div  class="card-content">
                        {{$quest->text}}
                    </div>
                </div>
            </div>

            <div class="col m4 s12">
                <div class="card">
                    <div  class="card-content">
                        <img width="100%" src="{{$quest->img}}" alt=" {{$quest->name}}">
                       {{$quest->name}}
                        <div>Початок:  {{$quest->start_date}}</div>
                        @if($quest->isPlayer(Auth::user()->id))
                            <a href="{{url("/play/".$quest->id)}}" class="waves-effect waves-light btn">Грати</a>
                        @else
                        <button class="waves-effect waves-light btn">Записатись за {{$quest->coins}} <i class="fa fa-gg-circle"></i></button>
                        <button class="waves-effect waves-light btn">Записатись за {{$quest->money}} <i class="fa fa-money"></i></button>
                         @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
