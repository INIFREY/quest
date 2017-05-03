@extends('layouts.app')

        <!-- Main Content -->
@section('content')
    <div class="container">
        <form class="card-panel" method="POST" action="{{ url('/password/email') }}" id="emailForm">
            <h4>Відновлення пароля</h4>
            @if (session('status'))
                <blockquote>
                    {{ session('status') }}
                </blockquote>
            @endif
            {{ csrf_field() }}

            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name="email" type="email"
                           class="{{ $errors->has('email') ? 'invalid' : '' }}">
                    @if ($errors->has('email'))
                        <div class="inputError">{{ $errors->first('email') }}</div>
                    @endif
                    <label for="email">E-mail</label>
                </div>

                <div class="col l6 s12">
                    <div class="input-field">
                        <button type="submit" class="btn waves-effect waves-light">
                            Відправити посилання для зміни пароля <i class="material-icons right">email</i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
