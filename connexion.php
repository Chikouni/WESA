<?php 
require_once 'config.php'; 

session_start(); 



    //Recuperer les POST
    $username = !empty($_POST['identifiant']) ? trim($_POST['identifiant']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    $sql = "SELECT password, email FROM membres WHERE pseudo = :identifiant";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':identifiant', $username);
    
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    $email =$user->email;
    if(password_verify($_POST['password'],$user->password))
        {
        
            echo "1";
          $_SESSION['pseudo'] = $username;
          $_SESSION['connect']=1;
          $_SESSION['email']=$email;
        }
    else{
            echo "L'email ou le mot de passe n'est pas correct !";
        }
    

