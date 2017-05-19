@extends('layouts.admin')

@section('title', 'Користувачі')
@section('navId', 'navAdmins')

@section('ThemeJS')
    <script type="text/javascript" src="{{url('assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/forms/selects/select2.min.js')}}"></script>


    <script type="text/javascript" src="{{url('assets/js/pages/datatables_basic.js')}}"></script>
@endsection


@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Таблиця адміністраторів<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a class="editAdmin" data-toggle="modal" data-target="#adminForm" data-id="no" title="Додати"><i class="icon-add"></i></a></li>
                    <li><a data-action="reload" data-type="admins"></a></li>
                </ul>
            </div>
        </div>
        @include('admin.ajax.admins_table', ['admins' => $admins])
    </div>

    <div id="adminForm" class="modal fade">
        @include('admin.ajax.admin_form')
    </div>

    <script>
        $('.editAdmin').click(function () {
            $.ajax({
                url: "http://game.wevudu.com/admin/ajax/edit/admin/"+$(this).data("id"),
                type: "POST",
                success: function(data) {
                    $('#adminForm').html(data);
                    console.log(data);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    </script>

@endsection

