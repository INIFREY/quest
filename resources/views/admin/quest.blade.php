@extends('layouts.admin')

@section('title', $quest?"Редагувати квест":"Додати квест")
@section('navId', $quest?"Редагувати квест":"navQuest")

@section('ThemeJS')
    <script type="text/javascript" src="{{url('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/pages/form_inputs.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/forms/styling/switch.min.js')}}"></script>

    <script type="text/javascript" src="{{url('assets/js/pages/form_checkboxes_radios.js')}}"></script>

    <script type="text/javascript" src="{{url('assets/js/plugins/notifications/jgrowl.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/pickers/anytime.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/pickers/pickadate/picker.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/plugins/pickers/pickadate/legacy.js')}}"></script>

    <script type="text/javascript" src="{{url('assets/js/pages/picker_date.js')}}"></script>

    <script type="text/javascript" src="{{url('assets/js/plugins/editors/summernote/summernote.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/pages/editor_summernote.js')}}"></script>
@endsection


@section('content')

    <div class="panel panel-flat">
        <div class="panel-body">
            <form class="form-horizontal" action="{{$quest?url('admin/quest/'.$quest->id):url('admin/quest/new')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-md-2" for="name">Назва</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="name" id="name" value="{{$quest?$quest->name : ""}}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4">
                        <div class="row">
                            <label class="control-label col-md-4" for="coins">Вартість в монетах</label>
                            <div class="col-md-6 col-md-offset-2">
                                <input type="text" class="form-control" name="coins" id="coins" value="{{$quest?$quest->coins : ""}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="row">
                            <label class="control-label col-md-4 col-md-offset-2" for="money">Вартість в грн</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="money" id="money" value="{{$quest?$quest->money : ""}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-md-offset-1">
                        <div class="row">
                            <div class="checkbox checkbox-switch">
                                <label>
                                    Безкоштовний?
                                    <input name="free" id="free" type="checkbox" data-off-color="danger" data-on-text="Так" data-off-text="Ні" class="switch" data-size="mini"
                                           {{($quest)?($quest->free?"checked":""):""}}>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="control-label col-md-4" for="start_date">Дата початку</label>
                            <div class="col-md-8">
                                <input type="text" name="start_date" id="start_date" class="form-control" value="{{$quest?Carbon\Carbon::parse($quest->start_date)->format('d.m.Y H:i')  : ""}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <label class="control-label col-md-2 col-md-offset-2" for="end_date">Дата кінця</label>
                            <div class="col-md-8">
                                <input type="text" name="end_date" id="end_date" class="form-control" value="{{$quest?Carbon\Carbon::parse($quest->end_date)->format('d.m.Y H:i')  : ""}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="description">Короткий опис</label>
                    <div class="col-md-10">
                        <textarea name="description" id="description" class="form-control">{{$quest?$quest->description : ""}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="name">Повний опис</label>
                    <div class="col-md-10">
                        <textarea id="text" name="text" class="summernote">
                            {{$quest?$quest->text : ""}}
                        </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="img">Мініатюра (квадрат)</label>
                    <div class="col-md-10">
                        <input name="img" id="img" type="file" class="file-styled">
                    </div>
                </div>

                {{ csrf_field() }}

                <div class="text-right">
                    <button type="submit" class="btn btn-success">Зберегти <i class="icon-arrow-right14 position-right"></i></button>
                </div>

             </form>
        </div>

    </div>


@endsection


