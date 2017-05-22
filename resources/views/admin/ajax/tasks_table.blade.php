<table class="table datatable-basic" id="tasksData" >
    <thead>
    <tr>
        <th>id</th>
        <th>Назва</th>
        <th>Відповідь</th>
        <th>Порядковий номер</th>
        <th class="text-center">Дії</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($tasks as $task)
        <tr>
            <td><a href="#!">{{$task->id}}</a></td>
            <td>{{$task->name}}</td>
            <td>{{$task->answer}}</td>
            <td>{{$task->sorting}}</td>
            <td class="text-center">
                <ul class="icons-list">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#" class="editQuest" ><i class=" icon-pencil4"></i> Редагувати</a></li>
                        </ul>
                    </li>
                </ul>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

