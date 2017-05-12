@extends('layouts.app')

@section('content')
    <div class="container">
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
                df
            </div>
        </div>
    </div>

@endsection
