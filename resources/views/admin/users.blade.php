@extends('layouts.admin')

@section('title', 'Користувачі')
@section('navId', 'navUsers')

@section('ThemeJS')
    <script type="text/javascript" src="{{url('assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/forms/selects/select2.min.js')}}"></script>


    <script type="text/javascript" src="{{url('assets/js/pages/datatables_basic.js')}}"></script>
@endsection


@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Таблиця користувачів<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="reload" data-type="users"></a></li>
                </ul>
            </div>
        </div>
        @include('admin.ajax.users_table', ['users' => $users])
    </div>
@endsection


