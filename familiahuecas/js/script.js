

$('#login-button').click(function () {
    $("tr.trtexttag").hide();
    $("tr.trtexttagError").hide();
    $("tr.trtexttagErrorLogin").hide();
    $("tr.trtexttagErrorRecupera").hide();
    $("tr.trOkRecupera").hide();

    $('#login-button').fadeOut("slow", function () {
        $("#container").fadeIn();
        TweenMax.from("#container", .4, {scale: 0, ease: Sine.easeInOut});
        TweenMax.to("#container", .4, {scale: 1, ease: Sine.easeInOut});
    });
});

$(".close-btn").click(function () {
    TweenMax.from("#container", .4, {scale: 1, ease: Sine.easeInOut});
    TweenMax.to("#container", .4, {left: "0px", scale: 0, ease: Sine.easeInOut});
    $("#container, #forgotten-container").fadeOut(800, function () {
        $("#login-button").fadeIn(800);
    });
    $("#container, #registro-container").fadeOut(800, function () {
        $("#login-button").fadeIn(800);
    });
});

/* Forgotten Password */
$('#forgotten').click(function () {
    $("#container").fadeOut(function () {
        $("#forgotten-container").fadeIn();
    });
});

/* Registro */
$('#registro').click(function () {
    $("#container").fadeOut(function () {
        $("#registro-container").fadeIn();
    });
});
$(".close-btn-recuperar").click(function () {
   location.href="index.php"
});

/* Menu Central */
$('#registro').click(function () {
    $("#container").fadeOut(function () {
        $("#registro-container").fadeIn();
    });
});








