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

    $("#loginForm").validate({
        rules: {
            login: {
                required: true,
                alpha_dash: true,
                minlength: 3,
                maxlength: 25

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

    $('input').focus(function(){
        $(this).next('.inputError').hide();
    });


    /********************* **********************/
    /*********      Форма входа      ************/
    /********************* **********************/

    $("#registerForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            login: {
                required: true,
                alpha_dash: true,
                minlength: 3,
                maxlength: 25

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
                minlength: 6
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



});