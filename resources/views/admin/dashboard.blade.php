@extends('layouts.admin')

@section('title', 'Page Title')

@section('ThemeJS')
    <script type="text/javascript" src="assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>

    <script type="text/javascript" src="assets/js/pages/dashboard.js"></script>
@endsection

@section('content')
    Админ вошел <br>
    {{$aId}} <br>
    {{$uId}} <br>
    <a href="{{url('admin/logout')}}">Выход</a>
@endsection


