@extends('layouts.app')

@section('content')
    <div class="container">
        @if (isset($error))
            <div class="card red">
                <div  class="card-content white-text">
                    <span class="card-title white-text"><i class="material-icons">error</i>  Помилка!</span>
                    @if (isset($errVerified))
                        <p>Ця електронна адреса раніше уже була підтверджена.</p>
                    @endif
                    @if (isset($errLink))
                        <p>Посилання для підтвердження email невірне.</p>
                    @endif
                </div>
                <button type="button" class="close white-text">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        <div class="card orange">
            <div  class="card-content white-text">
                <span class="card-title white-text"><i class="material-icons">warning</i>  Email не підтверджено!</span>
                <p>Для подальшої роботи з сайтом необхідно підтвердити email.</p>
                <p>Лист з інформацією для підтвердження уже відправлено на вашу електронну адресу.</p>
            </div>
        </div>

        <div class="card deep-purple">
            <div  class="card-content white-text">
                <span class="card-title white-text"><i class="material-icons">info</i>  Не приходить повідомлення?</span>
                <p>Можливо, воно випадково потрапило в папку "Спам". Перевірте її.</p>
                <p>Там також немає? Ви можете ще раз відправити повідомлення.</p>
                <p>
                    <button id="resendEmail" class="btn waves-effect waves-light purple lighten-1">
                        Відправити <i class="material-icons right">send</i>
                    </button>
                </p>
                <p>Все одно не прийшло? Спробуйте вказати інший email.</p>

                <ul class="collapsible collapsible-accordion" data-collapsible="expandable">
                    <li>
                        <div class="collapsible-header purple white-text">Змінити email</div>
                        <form class="collapsible-body purple lighten-5 blue-grey-text" method="POST" action="{{url('/email/change')}} " id="changeEmailForm">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="input-field col s12">
                                <input id="email" name="email" type="email"
                                       class="{{ $errors->has('email') ? 'invalid' : '' }}">
                                @if ($errors->has('email'))
                                    <div class="inputError">{{ $errors->first('email') }}</div>
                                @endif
                                <label class=" black-text" for="email">Новий e-mail</label>
                            </div>
                            <div class="col s12">
                                <div class="input-field">
                                    <button type="submit" class="btn waves-effect waves-light purple lighten-1">
                                        Підтвердити <i class="material-icons right">forward</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>

            </div>

        </div>

    </div>

@endsection
