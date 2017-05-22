<table class="table datatable-basic" id="questsData" >
    <thead>
    <tr>
        <th>id</th>
        <th>Назва</th>
        <th>Монет</th>
        <th>Грн</th>
        <th>Безкоштовний?</th>
        <th>Дата</th>
        <th class="text-center">Дії</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($quests as $quest)
        <tr>
            <td><a href="#!">{{$quest->id}}</a></td>
            <td>{{$quest->name}}</td>
            <td>{{$quest->coins}}</td>
            <td>{{$quest->money}}</td>
            <td>{{$quest->free?"Так":"Ні"}}</td>
            <td>{{Carbon\Carbon::parse($quest->start_date)->format('d.m.Y H:i') }} {{$quest->end_date?"- ".Carbon\Carbon::parse($quest->end_date)->format('d.m.Y H:i') :""}}</td>
            <td class="text-center">
                <ul class="icons-list">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{url("/admin/quest/".$quest->id)}}" class="editQuest" ><i class=" icon-pencil4"></i> Редагувати</a></li>
                            <li><a href="{{url("/admin/quest/".$quest->id."/tasks")}}"><i class=" icon-list3"></i> Список питань</a></li>
                            <li><a href="{{url("/admin/quest/".$quest->id."/answers")}}"><i class=" icon-add-to-list"></i> Додати питання</a></li>
                        </ul>
                    </li>
                </ul>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

