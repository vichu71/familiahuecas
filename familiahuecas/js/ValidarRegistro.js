// JavaScript Validacion de registro

$('document').ready(function ()
{

    // Validacion de nombres
    var nameregex = /^[a-zA-Z ]+$/;

    $.validator.addMethod("validname", function (value, element) {
        return this.optional(element) || nameregex.test(value);

    });

    // valid email pattern
    var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    $.validator.addMethod("validemail", function (value, element) {
        return this.optional(element) || eregex.test(value);

    });

    $("#loginform").validate({

        rules:
                {

                    email: {
                        required: true,
                        validemail: true,

                    },

                    pass: {
                        required: true,
                        minlength: 4,
                        maxlength: 15
                    }
                },
        messages:
                {

                    email: {
                        required: "Email es requerido",
                        validemail: "Por favor ingrese una dirección E-mail válida",
                        remote: "Email ya existe"
                    },

                    pass: {
                        required: "Contraseña es requerida",
                        minlength: "La contraseña debe tener como minimo 4 caracteres"
                    }
                },
        submitHandler: submitloginform


    });


    function submitloginform() {

        $.ajax({
            type: "POST",
            url: 'login.php',
            data: $('#loginform').serialize(),
            success: function (response)
            {
                var jsonData = JSON.parse(response);

                if (jsonData.success === 1)
                {
                    location.href = 'portal.php';
                 

                    $("tr.trtexttagErrorLogin").hide();
                } else
                {

                    $("tr.trtexttagErrorLogin").show();

                }
            }
        });

    }

    $("#registroform").validate({

        rules:
                {
                    nombre: {
                        required: true,
                        validname: true,
                        minlength: 4
                    },
                    email: {
                        required: true,
                        validemail: true,
                        remote: {
                            url: "revisarEmail.php",
                            type: "post",
                            data: {
                                email: function () {
                                    return $("#email").val();

                                }
                            }
                        }
                    },
                    apellidos: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },

                    usuario: {
                        required: true,
                        minlength: 3,
                        maxlength: 15
                    },
                    pass: {
                        required: true,
                        minlength: 4,
                        maxlength: 15
                    },
                    pass2: {
                        required: true,
                        equalTo: '#pass'
                    },
                },
        messages:
                {
                    nombre: {
                        required: "Pon un nombre",
                        validname: "El nombre debe contener solo alfabetos y espacio",
                        minlength: "Tu nombre es muy corto"
                    },
                    email: {
                        required: "Email es requerido",
                        validemail: "Por favor ingrese una dirección E-mail válida",
                        remote: "Email ya existe"
                    },
                    apellidos: {
                        required: "Pon los apellidos",
                        minlength: "El minimo de caracteres es 3"
                    },
                    usuario: {
                        required: "Falta el usuario",
                        minlength: "El minimo de caracteres es 4"
                    },
                    pass: {
                        required: "Contraseña es requerida",
                        minlength: "La contraseña debe tener como minimo 4 caracteres"
                    },
                    pass2: {
                        required: "Reescribe tu contraseña",
                        equalTo: "La contraseña no coincide!"
                    }
                },
        submitHandler: submitregistroform


    });


    function submitregistroform() {
        $.ajax({
            type: "POST",
            url: 'registro.php',
            data: $('#registroform').serialize(),
            success: function (response)
            {

                console.log(response);
                var jsonData = JSON.parse(response);

                if (jsonData.success === 1)
                {
                    $("tr.trtexttagError").hide();
                    $("tr.trtexttag").show();


                } else
                {
                    $("tr.trtexttag").hide();
                    $("tr.trtexttagError").show();

                }
            }
        });


    }

    $("#recuperarform").validate({

        rules:
                {

                    email: {
                        required: true,
                        validemail: true,

                    }
                },
        messages:
                {

                    email: {
                        required: "Email es requerido",
                        validemail: "Por favor ingrese una dirección E-mail válida"

                    }
                },
        submitHandler: submitrecuperarform


    });


    function submitrecuperarform() {

        $.ajax({
            type: "POST",
            url: 'revisarEmailrecuperacion.php',
            data: $('#recuperarform').serialize(),
            success: function (response)
            {
                
               var jsonData = JSON.parse(response);
              
                if (jsonData.success === 1)
                {
                    $("tr.trtexttagErrorRecupera").hide();
                    $("tr.trOkRecupera").show();
                    $.ajax({
                        type: "POST",
                        url: 'enviarEmail.php',
                        data: $('#recuperarform').serialize(),
                        success: function (response) {

                            console.log(response);

                        }});
                } else
                {
                    $("tr.trtexttagErrorRecupera").show();
                    $("tr.trOkRecupera").hide();

                }
            }
        });

    }

    $("#recuperarformresponse").validate({

        rules:
                {

                    pass: {
                        required: true,
                        minlength: 4,
                        maxlength: 15
                    },
                    pass2: {
                        required: true,
                        equalTo: '#pass'
                    },
                     email: {
                        required: true

                    }
                },
        messages:
                {

                    pass: {
                        required: "Contraseña es requerida",
                        minlength: "La contraseña debe tener como minimo 4 caracteres"
                    },
                    pass2: {
                        required: "Reescribe tu contraseña",
                        equalTo: "La contraseña no coincide!"
                    }, 
                    email: {
                        required: "Email es requerido"

                    }
                },
        submitHandler: submitrecuperarformresponse


    });


    function submitrecuperarformresponse() {

        $.ajax({
            type: "POST",
            url: 'cambiarContrasena.php',
            data: $('#recuperarformresponse').serialize(),
            success: function (response)
            {
               
                var jsonData = JSON.parse(response);
               
                if (jsonData.success === 1)
                {

                    $("tr.trtexttagErrorRecupera").hide();
                    $("tr.trOkRecupera").show();

                } else
                {

                    $("tr.trtexttagErrorRecupera").show();
                    $("tr.trOkRecupera").hide();

                }
            }
        });

    }
});