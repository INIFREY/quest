
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">{{isset($target)?"Редагування":"Додавання"}} адміністратора</h5>
            </div>

            <form action="{{isset($target)?"/edit":"/add"}}" method="post" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Логін</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="TestLogin" class="form-control" value="{{$target->login or ""}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Ім'я</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Вася" class="form-control" value="{{$target->name or ""}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Прізвище</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Петров" class="form-control" value="{{$target->surname or ""}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Роль</label>
                        <div class="col-sm-9">
                            <input type="text"  class="form-control">
                        </div>
                    </div>

                    @if (!isset($target))
                    <div class="form-group">
                        <label class="control-label col-sm-3">Пароль</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control">
                        </div>
                    </div>
                    @endif

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-primary">Зберегти</button>
                </div>
            </form>
        </div>
    </div>
