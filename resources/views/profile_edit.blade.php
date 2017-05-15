@extends('layouts.app')

@section('content')
    <div class="container profileEdit">
        <div class="row">
            <div class="col m6 s12">
                <ul class="collapsible collapsible-accordion" data-collapsible="expandable">
                    <li>
                        <div class="collapsible-header teal white-text">Основні дані
                            @if (!$user->wasEarlierCoin("editGeneral"))
                            <span class="new badge red tooltipped" data-tooltip="Отримаєте, якщо заповните усі поля"  data-position="top" data-badge-caption="монет">+5</span>
                            @endif
                        </div>
                        <form class="collapsible-body teal lighten-5" method="POST" action="{{route('profileEditGeneral')}} "
                              id="changeProfileGeneralForm">
                            {{ csrf_field() }}
                            <div class="input-field">
                                <input id="name" name="name" type="text" value="{{$user->name}}"
                                       class="{{ $errors->has('name') ? 'invalid' : '' }}">
                                <label for="name">Ім'я</label>
                            </div>
                            <div class="input-field">
                                <textarea id="about" name="about" class="materialize-textarea characterCounter" length="255">{{$user->about or ""}}</textarea>
                                <label for="about">Коротко про себе</label>
                            </div>

                            <div class="input-field">
                                <button type="submit" class="btn waves-effect waves-light teal lighten-1">
                                    Зберегти <i class="material-icons right">save</i>
                                </button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>

            <div class="col m6 s12">
                <ul class="collapsible collapsible-accordion" data-collapsible="expandable">
                    <li>
                        <div class="collapsible-header teal white-text">Email
                        </div>
                        <form class="collapsible-body teal lighten-5" method="POST" action="{{url('/email/change')}} " id="changeEmailForm">
                            {{ csrf_field() }}
                            <div class="input-field">
                                <input id="email" name="email" type="email" value="{{$user->getEmailValue()}} "
                                       class="{{ $errors->has('email') ? 'invalid' : '' }}" >
                                <label class=" black-text" for="email">Новий e-mail</label>
                            </div>

                            <div class="input-field">
                                <button type="submit" class="btn waves-effect waves-light teal lighten-1">
                                    Зберегти <i class="material-icons right">save</i>
                                </button>
                            </div>
                        </form>
                    </li>

                    <li>
                        <div class="collapsible-header teal white-text">Пароль
                        </div>
                        <form class="collapsible-body teal lighten-5" method="POST" action="{{route('profileEditPassword')}} " autocomplete="off" id="changePassForm">
                            {{ csrf_field() }}
                            <div class="input-field">
                                <input id="password" name="password" type="password"
                                       class="{{ $errors->has('password') ? 'invalid' : '' }}" >
                                <label class=" black-text" for="password">Старий пароль</label>
                            </div>

                            <div class="input-field">
                                <input id="new_password" name="new_password" type="password"
                                       class="{{ $errors->has('new_password') ? 'invalid' : '' }}" >
                                <label class=" black-text" for="new_password">Новий пароль</label>
                            </div>

                            <div class="input-field">
                                <input id="new_password_confirmation" name="new_password_confirmation" type="password"
                                       class="{{ $errors->has('new_password_confirmation') ? 'invalid' : '' }}" >
                                <label class=" black-text" for="new_password_confirmation">Підтвердження пароля</label>
                            </div>

                            <div class="input-field">
                                <button type="submit" class="btn waves-effect waves-light teal lighten-1">
                                    Зберегти <i class="material-icons right">save</i>
                                </button>
                            </div>
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </div>

@endsection
