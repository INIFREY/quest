@extends('layouts.app')

@section('content')
    <div class="container quests">

            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <h3>{{$task->name}}</h3>
                            <p> {!!$task->text!!}</p>
                            <br>
                            <form method="POST" action="{{url('/play/'.$task->quest_id)}}">
                                {{ csrf_field() }}

                                <div class="input-field">
                                    <input id="answer" name="answer" type="text"
                                           class="{{ $errors->has('answer') ? 'invalid' : '' }}">
                                    @if ($errors->has('answer'))
                                        <div class="inputError">{{ $errors->first('answer') }}</div>
                                    @endif
                                    @if (isset($error))
                                        <div class="inputError">Відповідь не правильна!</div>
                                    @endif
                                    <label for="answer">Відповідь</label>
                                </div>

                                <div class="input-field">
                                    <button type="submit" class="btn waves-effect waves-light teal lighten-1">
                                        Відправити <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

    </div>

@endsection
