@extends('layouts.admin')

@section('title', 'Головна')
@section('navId', 'navMain')

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
    <div class="row">
        <div class="col-lg-5">

            <!-- Статистика реєстрацій -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Статистика реєстрацій</h6>
                    <div class="heading-elements">
                        <form class="heading-form" action="#">
                            <div class="form-group">
                                <select class="change-date select-sm" id="select_date">
                                    <optgroup label="<i class='icon-watch pull-right'></i> Період">
                                        {{$now = Carbon\Carbon::now()}}
                                        <option value="val1" selected="selected">{{$now->subDays(6)->format('d.m')}} - {{$now->addDays(6)->format('d.m')}}</option>
                                        <option value="val2">{{$now->subDays(7)->format('d.m')}} - {{$now->subDays(6)->format('d.m')}}</option>
                                        <option value="val3">{{$now->subDays(1)->format('d.m')}} - {{$now->subDays(6)->format('d.m')}}</option>
                                        <option value="val4">{{$now->subDays(1)->format('d.m')}} - {{$now->subDays(6)->format('d.m')}}</option>
                                    </optgroup>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i class="icon-calendar5 position-left text-slate"></i> 5,689</h5>
                                <span class="text-muted text-size-small">за тиждень</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i class="icon-calendar52 position-left text-slate"></i> 32,568</h5>
                                <span class="text-muted text-size-small">за місяць</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i class="icon-cash3 position-left text-slate"></i> $23,464</h5>
                                <span class="text-muted text-size-small">всього</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-group-sm" id="app_sales"></div>
                <div id="monthly-sales-stats"></div>
            </div>
            <!-- /Статистика реєстрацій -->

        </div>
    </div>


@endsection


