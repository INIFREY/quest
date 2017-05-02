@extends('layouts.app')

@section('content')
    <div class="container register">
        <form class="card-panel" method="POST" action="{{ url('/register') }}" id="registerForm">
            <h4>Реєстрація</h4>
            {{ csrf_field() }}

            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="login" name="login" type="text" value="{{old('login')}}"
                           class="{{ $errors->has('login')?'invalid':''}}">
                    @if ($errors->has('login'))
                        <div class="inputError">{{ $errors->first('login') }}</div>
                    @endif
                    <label for="name">Логін</label>
                </div>

                <div class="input-field col l6 s12">
                    <input id="name" name="name" type="text" value="{{ old('name') }}"
                           class="{{ $errors->has('name') ? 'invalid' : '' }}">
                    @if ($errors->has('name'))
                        <div class="inputError">{{ $errors->first('name') }}</div>
                    @endif
                    <label for="name">Ім'я</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="email" name="email" type="email" value="{{ old('email') }}"
                           class="{{ $errors->has('email') ? 'invalid' : '' }}">
                    @if ($errors->has('email'))
                        <div class="inputError">{{ $errors->first('email') }}</div>
                    @endif
                    <label for="email">E-mail</label>
                </div>

                <div class="input-field col l6 s12">
                    <input id="phone" name="phone" type="tel" value="{{ old('phone') }}"
                           class="{{ $errors->has('phone') ? 'invalid' : '' }}">
                    @if ($errors->has('phone'))
                        <div class="inputError">{{ $errors->first('phone') }}</div>
                    @endif
                    <label for="phone">Телефон</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="birth" name="birth" type="date" value="{{ old('birth') }}"
                           class="{{ $errors->has('birth') ? 'invalid' : '' }}">
                    @if ($errors->has('birth'))
                        <div class="inputError">{{ $errors->first('birth') }}</div>
                    @endif
                    <label for="birth">Дата народження</label>
                </div>

                <div class="input-field col l6 s12">
                    <select id="sex" name="sex" class="validation {{ $errors->has('sex') ? 'invalid' : '' }}">
                        <option value="" disabled {{old('sex')?'':'selected'}}>Стать</option>
                        <option value="1" {{old('sex')==1?'selected':''}}>Чоловік</option>
                        <option value="2" {{old('sex')==2?'selected':''}}>Жінка</option>
                    </select>
                    @if ($errors->has('sex'))
                        <div class="inputError">{{ $errors->first('sex') }}</div>
                    @endif
                    <label for="sex">Стать</label>
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

            <div class="row">
                <div class="col l6 s12">
                    <input type="checkbox" class="filled-in" id="rules" name="rules"
                           {{old('rules')?'checked':''}} data-error=".errRules"/>
                    <label for="rules">Погоджуюсь з <a href="#!">правилами</a></label>

                    <div class="input-field">
                        <div class="errRules"></div>
                    </div>
                </div>

                <div class="col l6 s12">
                    {!! app('captcha')->display() !!}
                    @if ($errors->has('g-recaptcha-response'))
                        <div class="input-field">
                            <div class="inputError">Підтвердіть, що ви не робот!</div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col l6 s12">
                    <button type="submit" class="btn waves-effect waves-light">
                        Реєстрація <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>

        </form>

    </div>
@endsection
