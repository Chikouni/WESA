function check(){
   var data = $("#login-form").serialize();
$.ajax({
type : 'POST',
url : "connexion.php",
data : data,
success : function(response){
if($.trim(response)=="1"){
window.location.href = "wesa.php"; 
} else {
$("#error").fadeIn(1000, function(){
$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>   '+response+' !</div>');
});
}
}
});
return false;
};

