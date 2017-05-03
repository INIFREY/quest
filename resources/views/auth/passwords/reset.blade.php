@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="card-panel" method="POST" action="{{ url('/password/reset') }}" id="resetForm">
            <h4>Зміна пароля</h4>
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name="email" type="email" value="{{ $email or old('email') }}"
                           class="{{ $errors->has('email') ? 'invalid' : '' }}">
                    @if ($errors->has('email'))
                        <div class="inputError">{{ $errors->first('email') }}</div>
                    @endif
                    <label for="email">E-mail</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="password" name="password" type="password"
                           class="{{ $errors->has('password') ? 'invalid' : '' }}">
                    @if ($errors->has('password'))
                        <div class="inputError">{{ $errors->first('password') }}</div>
                    @endif
                    <label for="password">Пароль</label>
                </div>

                <div class="input-field col l6 s12">
                    <input id="password_confirmation" name="password_confirmation" type="password"
                           class="{{ $errors->has('password_confirmation') ? 'invalid' : '' }}">
                    @if ($errors->has('password_confirmation'))
                        <div class="inputError">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                    <label for="password_confirmation">Підтвердження пароля</label>
                </div>
            </div>

            <div class="col l6 s12">
                <div class="input-field">
                    <button type="submit" class="btn waves-effect waves-light">
                        Змінити пароль <i class="material-icons right">loop</i>
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
