


$(window).on("load", cargarMenu);

function cargarMenu(){
    $("#container-portal").fadeIn();
     $("#container-pueblo").fadeIn();
    
}
$(".close-btn-portal").click(function () {
    location.href="destroysession.php";
   location.href="index.php";
});

$(".drop")
  .mouseover(function() {
  $(".dropdown").show(300);
});
$(".drop")
  .mouseleave(function() {
  $(".dropdown").hide(300);     
});








