<table class="table datatable-basic" id="usersData" >
    <thead>
    <tr>
        <th>id</th>
        <th>Логін</th>
        <th>Ім'я</th>
        <th>Email</th>
        <th>Дата народження</th>
        <th>Статус</th>
        <th class="text-center">Дії</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td><a href="{{url("/profile/". $user->id)}}">{{$user->id}}</a></td>
            <td>{{$user->login}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->getEmailValue()}}</td>
            <td>{{ Carbon\Carbon::parse($user->birth)->format('d-m-Y') }} ({{$user->getAge()}})</td>
            <td><span class="label label-success">Active</span></td>
            <td class="text-center">
                <ul class="icons-list">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#"><i class="icon-file-pdf"></i> Заблокувати</a></li>
                            <li><a href="#"><i class="icon-file-excel"></i> Видалити</a></li>
                        </ul>
                    </li>
                </ul>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

