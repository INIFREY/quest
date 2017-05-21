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
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, minus perferendis. Accusamus architecto consequatur dolores doloribus eum ex excepturi exercitationem illum itaque, laudantium numquam officia, possimus, quaerat quibusdam suscipit. Accusamus delectus error expedita inventore minima, nesciunt, nostrum odio quam recusandae repudiandae voluptas voluptate voluptatem! Commodi dignissimos minus mollitia quaerat ratione ut vel! Deleniti harum inventore itaque quaerat! Assumenda eius harum ipsum magnam nam nisi quod repudiandae sapiente similique, vero? Accusantium animi asperiores at consequuntur culpa delectus, error eum facilis fuga laudantium modi non optio provident, ratione suscipit, tempore tenetur unde? Accusantium aperiam est necessitatibus non optio saepe sed soluta voluptate.
                                </div>
                            </div>
                            <div class="quest-info">
                                Начало: {{Carbon\Carbon::parse($quest->start_date)->format('d.m.Y H:i') }}
                                <a href="{{url("/play/".$quest->id)}}" {{$quest->isStart()?:"disabled"}} class="waves-effect waves-light btn right">Грати</a>
                                <a href="{{url("/quest/".$quest->id)}}" class="waves-effect waves-light btn right">Подробиці</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
