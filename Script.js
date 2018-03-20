var password = document.getElementById("inputPass")
  , confirm_password = document.getElementById("inputPassverif");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Le mot de passe ne correspond pas");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

    $(document).ready(function() {
      $("#pseudo").change(function() {
        $(".aval,.exists,.wait").remove();
        var username = $(this).val();
        if(username != "") {
          var len = username.length;
          if(len >=5 && len <= 10) {
            //Username must be 5 to 10 characters long.
            //Change accrodangly yours
            $.ajax({
              url:"verif.php",
              data:{identifiant:username},
              type:'POST',
              success:function(response) {
                var resp = $.trim(response);
                $(".aval,.exists, .wait").remove();
                if(resp == "exists") {
                  //If username already exists it will display the following message
                  $("<span class='exists'>Pseudo déjà utilisé!</span>").insertAfter("#pseudo");
                    $("#submit").attr('disabled', 'disabled');
                } else if(resp == "notexists") {
                  
                  $("<span class='aval'>Pseudo disponible!</span>").insertAfter("#pseudo");
                }
              }
            });
          } else {
            //Affichage erreur
            $(".aval,.exists, .wait").remove();
            $("<span class='exists'>Le pseudo doit contenir entre 5 à 10 caratères.</span>").insertAfter("#pseudo");
          }
        } else {
          //hide de la class span
          $(".aval,.exists, .wait").remove();
        }
      });
    });