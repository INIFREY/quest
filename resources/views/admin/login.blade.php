<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вхід</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="../assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="../assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="../assets/js/plugins/forms/validation/validate.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="../assets/js/core/app.js"></script>
    <script type="text/javascript" src="../assets/js/pages/login_validation.js"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container bg-slate-800">
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="content">
                <form action="{{ url('admin/login') }}" class="form-validate" METHOD="post">
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-warning-400 text-warning-400"><i class="icon-lock2"></i></div>
                            <h5 class="content-group-lg">Вхід в адмінпанель <small class="display-block">Введіть ваші дані</small></h5>
                        </div>

                        {{ csrf_field() }}

                        <div class="form-group has-feedback has-feedback-left">
                            <input  id="login" name="login"   value="{{old('login')}}" type="text" class="form-control" placeholder="Логін" required>
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                            @if ($errors->has('login'))
                                <label id="login-error" class="validation-error-label" for="login">{{ $errors->first('login') }}</label>
                            @endif
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input id="password" name="password" type="password" class="form-control" placeholder="Пароль" required>
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            @if ($errors->has('password'))
                                <label id="password-error" class="validation-error-label" for="password">{{ $errors->first('password') }}</label>
                            @endif
                        </div>

                        <div class="form-group login-options">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" class="styled" id="remember" name="remember" {{old('remember')?'checked':''}}>
                                        Запам'ятати
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-blue btn-block">Вхід <i class="icon-circle-right2 position-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>