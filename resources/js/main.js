/**
 * Created by Валерий on 23.04.2017.
 */

$( document ).ready(function(){
    $(".dropdown-button").dropdown({
        belowOrigin: true,
        constrainWidth: false,
        alignment: 'right'
    });

    $(".button-collapse").sideNav({
        edge: 'left',
        closeOnClick: true,
        draggable: true,
        menuWidth: 190
    });

    $('select').material_select();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    /********************* **********************/
    /*********       Валидатор       ************/
    /*********    Форма регистрации   ***********/
    /********************* **********************/

    $('#phone').formatter({
        'pattern': '+38(0{{99}}) {{99}} {{99}} {{999}}',
        'persistent': true
    });

    var today = new Date();

    $('#birth').pickadate({
        selectMonths: true,
        selectYears: 100,
        max: new Date(today.getFullYear()-14,12,31),
        min: new Date(today.getFullYear()-70,1,1),
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy-mm-dd',
        today: ''
    });

    $.validator.addMethod("alpha_dash", function(value, element) {
        return this.optional(element) || /^[a-z0-9-\\_]+$/i.test(value);
    }, "Це поле може містити тільки латинські букви, цифри або дефіс.");

    $.validator.addMethod("mask_number_length", function(value, element, params) {
        return this.optional(element) || value.replace(/[^0-9]/g,"").length===params;
    }, "Невірний формат вводу!");

    $.validator.addMethod("spaces", function(value, element, params) {
        return this.optional(element) || value.replace(/\s/g,'')!='';
    }, "В полі не можуть бути тільки пробіли!");

    $.validator.addMethod("vk", function(value, element) {
        return this.optional(element) || /vk.com/.test(value);
    }, "Тут має бути посилання на vk.");

    $.validator.addMethod("fb", function(value, element) {
        return this.optional(element) || /facebook.com/.test(value);
    }, "Тут має бути посилання на facebook.");

    $.validator.addMethod("tw", function(value, element) {
        return this.optional(element) || /twitter.com/.test(value);
    }, "Тут має бути посилання на twitter.");


    $("#registerForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                spaces: true
            },
            login: {
                required: true,
                alpha_dash: true,
                minlength: 3,
                maxlength: 25,
                spaces: true

            },
            email: {
                required: true,
                email:true
            },
            phone:{
                required: true,
                mask_number_length: 12
            },
            birth:{
                required: true,
                date: true
            },
            sex:{
                required: true
            },
            password: {
                required: true,
                minlength: 6,
                spaces: true
            },
            password_confirmation: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            },
            rules:"required"
        },
        //For custom messages
        messages: {
            name:{
                required: "Введіть ім'я",
                minlength: "Мінімальна довжина - 3 символи"
            },
            login:{
                required: "Введіть логін",
                minlength: "Мінімальна довжина - 3 символи"
            },
            email:{
                required: "Введіть e-mail",
            },
            phone: "Номер телефону невірний!",
            password_confirmation:{
                equalTo: "Паролі не співпадають!",
            },
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        errorClass: 'invalid'
    });

    $('input').focus(function(){
        $(this).next('.inputError').hide();
    });


    /********************* **********************/
    /*********      Форма входа      ************/
    /********************* **********************/

    $("#loginForm").validate({
        rules: {
            login: {
                required: true,
                alpha_dash: true,
                minlength: 3,
                maxlength: 25,
                spaces: true

            },
            password: {
                required: true
            }
        },
        //For custom messages
        messages: {
            login:{
                required: "Введіть логін",
                minlength: "Мінімальна довжина - 3 символи"
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        errorClass: 'invalid'
    });


    /************************************ *******************************/
    /*********      Форма восстановления пароля (1 шаг)      ************/
    /************************************ *******************************/

    $("#emailForm").validate({
        rules: {
            email: {
                required: true,
                email:true
            }
        },
        messages: {
            email:{
                required: "Введіть електронну пошту",
                email: "Невірний формат"
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        errorClass: 'invalid',
        focusInvalid: false
    });

    /************************************ *******************************/
    /*********      Форма восстановления пароля (2 шаг)      ************/
    /************************************ *******************************/

    $("#resetForm").validate({
        rules: {
            email: {
                required: true,
                email:true
            },
            password: {
                required: true,
                minlength: 6,
                spaces: true
            },
            password_confirmation: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            }
        },
        messages: {
            email:{
                required: "Введіть електронну пошту",
                email: "Невірний формат"
            },
            password_confirmation: {
                equalTo: "Паролі не співпадають!",
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        errorClass: 'invalid',
        focusInvalid: false
    });

    /********************** *******************************/
    /*********      Форма изменения почты      ************/
    /********************** *******************************/

    $("#changeEmailForm").validate({
        rules: {
            email: {
                required: true,
                email:true
            }
        },
        messages: {
            email:{
                required: "Введіть електронну пошту",
                email: "Невірний формат"
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        errorClass: 'invalid',
        focusInvalid: false,
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(data) {
                    if (data.status=='success') swal("Готово!", "Вашу алектронну адресу успішно змінено! На нову адресу уже відправлено лист для її активації.", "success");
                    else if (data.status=='error') {
                        text = '';
                        if (data.msg == 'old') text = "Ви ввели вашу стару електронну адресу.";
                        swal("Помилка!", text, "error");
                    } else console.log(data);
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    if (errors['email'])  swal("Помилка!", errors['email'][0], "error");
                    else{
                        swal("Помилка!", "", "error");
                        console.log(data);
                    }

                }
            });
        }
    });


    // Повторная отправка письма-подтверждения
    $('#resendEmail').click(function(){
        $.ajax({
            url: "/email/sendActivate",
            success: function(data){
                if (data.status=='success') swal("Відправлено!", "Перевірте свою електронну адресу!", "success");
                else if (data.status=='error') {
                    text = '';
                    if (data.msg == 'verified') text = "Таку електронну адресу уже підтверджено.";
                    swal("Помилка!", text, "error");
                } else console.log(data);
            },
            error: function(data){
                console.log(data);
            }
        });
    });


    /********************** *************************************************/
    /*********      Форма изменения основных данных профиля      ************/
    /********************** *************************************************/

    $("#changeProfileGeneralForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                spaces: true
            },
            about: {
                minlength: 10,
                maxlength: 255,
                spaces: true
            }
        },
        messages: {

        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        errorClass: 'invalid',
        focusInvalid: false,
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(data) {
                    if (data.status=='success') swal({ title: "Готово!",
                        text:"Ваші дані успішно змінено!",
                        type: "success",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function(){
                        if (data.money=='success') {
                            $('#coinsEditGeneral').hide();
                            swal("Вам нараховано "+data.moneyCount+" монет");
                        }
                        else swal.close();
                    });
                    else if (data.status=='error') {
                        swal("Помилка!", "", "error");
                    } else{
                        swal("Помилка!", "", "error");
                        console.log(data);
                    }
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    if (errors['name'])  swal("Помилка!", errors['name'][0], "error");
                    else if (errors['about'])  swal("Помилка!", errors['about'][0], "error");
                    else{
                        swal("Помилка!", "", "error");
                        console.log(data);
                    }

                }
            });
        }
    });


    /********************** *********************************/
    /*********      Форма изменения пароля      *************/
    /********************** *********************************/

    $("#changePassForm").validate({
        rules: {
            password: {
                required: true,
                spaces: true
            },
            new_password: {
                required: true,
                minlength: 6,
                spaces: true
            },
            new_password_confirmation: {
                required: true,
                minlength: 6,
                equalTo: "#new_password"
            },
        },
        messages: {

        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        errorClass: 'invalid',
        focusInvalid: false,
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(data) {
                    if (data.status=='success') swal("Готово!", "Ваш пароль успішно змінено!", "success");
                    else {
                        var text = data.msg || "";
                        swal("Помилка!", text, "error");
                        console.log(data);
                    }
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    if (errors[0])  swal("Помилка!", errors[0][0], "error");
                    else{
                        swal("Помилка!", "", "error");
                        console.log(data);
                    }

                }
            });
        }
    });


    /********************** *********************************/
    /*********      Форма загрузки фото         *************/
    /********************** *********************************/

    $("#changeProfilePhotoForm").validate({
        rules: {
            
        },
        messages: {

        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        errorClass: 'invalid',
        focusInvalid: false,
        submitHandler: function(form) {
            $('#loader').show();
            $.ajax({
                url: form.action,
                type: form.method,

                contentType: false, // важно - убираем форматирование данных по умолчанию
                processData: false, // важно - убираем преобразование строк по умолчанию
                data: new FormData($(form)[0]),
                success: function(data) {
                    $('#loader').hide();
                    if (data.status=='success') swal({ title: "Готово!",
                        text:"Ваше фото успішно завантажено!",
                        type: "success",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function(){
                        if (data.money=='success') {
                            $('#coinsEditPhoto').hide();
                            swal("Вам нараховано "+data.moneyCount+" монет");
                        }
                        else swal.close();
                    });
                    else {
                        var text = data.msg || "";
                        swal("Помилка!", text, "error");
                        console.log(data);
                    }
                },
                error: function(data) {
                    $('#loader').hide();
                    var errors = data.responseJSON;
                    if (errors){
                        for(var e in errors) {
                            swal("Помилка!", errors[e][0], "error");
                            break;
                        }
                    }
                    else{
                        swal("Помилка!", "", "error");
                        console.log(data);
                    }

                }
            });
        }
    });

    /********************** *************************************************/
    /*********          Форма редактирования соц. сетей          ************/
    /********************** *************************************************/

    $("#changeProfileSocialForm").validate({
        rules: {
            vk: {
                minlength: 2,
                maxlength: 255,
                vk: true
            },
            fb: {
                minlength: 2,
                maxlength: 255,
                fb: true
            },
            tw: {
                minlength: 2,
                maxlength: 255,
                tw: true
            }
        },
        messages: {

        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        errorClass: 'invalid',
        focusInvalid: false,
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(data) {
                    if (data.status=='success') swal({ title: "Готово!",
                        text:"Ваші дані успішно змінено!",
                        type: "success",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }, function(){
                        if (data.money=='success') {
                            $('#coinsEditSocial').hide();
                            swal("Вам нараховано "+data.moneyCount+" монет");
                        }
                        else swal.close();
                    });
                    else {
                        var text = data.msg || "";
                        swal("Помилка!", text, "error");
                        console.log(data);
                    }
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    if (errors){
                        for(var e in errors) {
                            swal("Помилка!", errors[e][0], "error");
                            break;
                        }
                    }
                    else{
                        swal("Помилка!", "", "error");
                        console.log(data);
                    }
                }
            });
        }
    });


    // Закрытие карточек при нажатии на крестик
    $(".card .close").click(function() {
        $(this).closest(".card").fadeOut("slow")
    });

    // Запуск подсчета введенных символов в инпутах
    $('.characterCounter').characterCounter();

    // Всплывающие подсказки
    $('.tooltipped').tooltip({delay: 50});

    // Загрузка файлов
    $('.dropify').dropify({
        messages: {
            'default': 'Перетягніть файл або натисніть сюди',
            'replace': 'Перетягніть або натисніть, щоб замінити',
            'remove':  'Видалити',
            'error':   'Упс, щось пішло не так.'
        },
        error: {
            'fileSize': 'Файл занадто великий. Максимальний розмір {{ value }}b.',
            'minWidth': 'The image width is too small ({{ value }}}px min).',
            'maxWidth': 'The image width is too big ({{ value }}}px max).',
            'minHeight': 'The image height is too small ({{ value }}}px min).',
            'maxHeight': 'The image height is too big ({{ value }}px max).',
            'fileExtension': 'Дозволяються тільки такі формати: ({{ value }}).'
        }
    });


});