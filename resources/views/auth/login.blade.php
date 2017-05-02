@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="card-panel" role="form" method="POST" autocomplete="off" action="{{ url('/login') }} " id="loginForm">
            <h4>Вхід</h4>
            {{ csrf_field() }}

            <div class="row">
                <div class="input-field col s12">
                    <input id="login" name="login" type="text" value="{{old('login')}}"
                           class="{{ $errors->has('login')?'invalid':''}}">
                    @if ($errors->has('login'))
                        <div class="inputError">{{ $errors->first('login') }}</div>
                    @endif
                    <label for="name">Логін</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="password" name="password" type="password"
                           class="{{ $errors->has('password') ? 'invalid' : '' }}">
                    @if ($errors->has('password'))
                        <div class="inputError">{{ $errors->first('password') }}</div>
                    @endif
                    <label for="password">Пароль</label>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <input type="checkbox" class="filled-in" id="remember" name="remember" {{old('remember')?'checked':''}}/>
                    <label for="remember">Запам'ятати мене</label>
                </div>
            </div>

            <div class="row">
                <div class="col l6 s12">
                    <div class="input-field">
                        <button type="submit" class="btn waves-effect waves-light">
                            Вхід <i class="material-icons right">input</i>
                        </button>
                    </div>
                </div>
                <div class="col l6 s12">
                    <div class="input-field">
                    <a class="btn waves-effect waves-light" href="{{url('/password/reset')}}">Забули пароль? <i class="material-icons right">info</i></a>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
