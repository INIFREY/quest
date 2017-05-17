@extends('layouts.app')

@section('content')
    <div class="container profile">

        <div class="row">
            <div class="col m4 s12">
                <div class="card">
                    <div  class="card-content center-align">
                        <img src="{{$user->getAvatarUrl()}}" alt="Login" class="circle profile-image z-depth-3">
                        <div class="profile-name">{{$user->name}}</div>
                        <hr class="light">
                        <div class="">Рейтинг: {{$user->points}} балів</div>
                        <div class="progress">
                            <div class="determinate" style="width: {{$user->getPercentPoints()}}%"></div>
                        </div>
                    </div>
                    <div class="collection profile-actions center-align">
                        @if ($canEdit)
                        <a href="/profile/edit" class="collection-item"><i class="material-icons">edit</i> Редагувати</a>
                        <a href="#!" class="collection-item"><i class="material-icons">help_outline</i> Як заробити бали?</a>
                        @else
                        <a href="#!" class="collection-item"><i class="material-icons">person_add</i> Додати у друзі</a>
                        @endif
                    </div>
                    <div class="card-content center-align ">
                        <div>Вік: {{$user->getAge()}}</div>
                        @if ($user->about)
                            <div>Про себе: {{$user->about}}</div>
                        @endif
                        <div class="profile-social">
                            @if ($user->getSoc("vk"))
                                <a href="{{$user->getSocUrl("vk")}}" target="_blank"><i class="fa fa-vk"></i></a>
                            @endif
                            @if ($user->getSoc("fb"))
                                    <a href="{{$user->getSocUrl("fb")}}" target="_blank"><i class="fa fa-facebook"></i></a>
                            @endif
                            @if ($user->getSoc("tw"))
                                    <a href="{{$user->getSocUrl("tw")}}" target="_blank"><i class="fa fa-twitter"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col m8 s12">
                <div class="card center-align profile-statistics">
                    <div class="row">
                        <div class="card-content col s4">
                            <div class="card-title">
                                <i class="fa fa-trophy"></i>
                                1
                            </div>
                            <div class="medium-small grey-text">Перемог у квестах</div>
                        </div>
                        <div class="card-content col s4">
                            <div class="card-title">
                                <i class="fa fa-star"></i>
                                7
                            </div>
                            <div class="medium-small grey-text">Участей у заходах</div>
                        </div>
                        <div class="card-content col s4">
                            <div class="card-title">
                                <i class="fa fa-calendar-check-o "></i>
                                {{$user->getRegDays()}}
                            </div>
                            <div class="medium-small grey-text">Днів з нами</div>
                        </div>
                    </div>
                </div>

                <div class="card center-align profile-statistics">

                    <div class="row">

                        <div class="card-content col s6">
                            <div class="card-title">
                                <i class="fa fa-gg-circle"></i>
                                {{$user->coins}}
                            </div>
                            <div class="medium-small grey-text">Монет</div>
                        </div>
                        <div class="card-content col s6">
                            <div class="card-title">
                                <i class="fa fa-money"></i>
                                {{$user->money}}
                            </div>
                            <div class="medium-small grey-text">Гривень</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
