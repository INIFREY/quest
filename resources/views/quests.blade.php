@extends('layouts.app')

@section('content')
    <div class="container quests">
        @foreach ($quests as $quest)
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <img class="quests-img" width="100" src="{{$quest->img}}" alt="{{$quest->name}}">
                            <div class="quest-content">
                                <div class="title">{{$quest->name}}</div>
                                <div class="description">
                                    {{$quest->description}}
                                </div>
                            </div>
                            <div class="quest-info">
                                @if($quest->finished())
                                    Квест закінчився {{Carbon\Carbon::parse($quest->end_date)->format('d.m.Y') }}
                                @else
                                    Початок: {{Carbon\Carbon::parse($quest->start_date)->format('d.m.Y H:i') }}
                                @endif
                                <a href="{{url("/play/".$quest->id)}}" {{($quest->isStart() && $quest->isPlayer(Auth::user()->id))?:"disabled"}} class="waves-effect waves-light btn right">Грати</a>
                                <a href="{{url("/quest/".$quest->id)}}" class="waves-effect waves-light btn right">Подробиці</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
