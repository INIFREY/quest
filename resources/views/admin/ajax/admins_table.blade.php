<table class="table datatable-basic" id="adminsData" >
    <thead>
    <tr>
        <th>id</th>
        <th>Логін</th>
        <th>Ім'я</th>
        <th>Роль</th>
        <th class="text-center">Дії</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($admins as $admin)
        <tr>
            <td><a href="#!">{{$admin->id}}</a></td>
            <td>{{$admin->login}}</td>
            <td>{{$admin->name}} {{$admin->surname}}</td>
            <td>{{$admin->getRoleName()}}</td>
            <td class="text-center">
                <ul class="icons-list">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#!" class="editAdmin" data-toggle="modal" data-target="#adminForm" data-id="{{$admin->id}}" ><i class="icon-file-pdf"></i> Редагувати</a></li>
                            <li><a href="#"><i class="icon-file-excel"></i> Видалити</a></li>
                        </ul>
                    </li>
                </ul>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

