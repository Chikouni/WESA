<?php 
require_once 'config.php'; 

session_start(); 


echo "uesh";
    //Recuperer les POST
    $username = !empty($_POST['identifiant']) ? trim($_POST['identifiant']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    $sql = "SELECT password FROM membres WHERE pseudo = :identifiant";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':identifiant', $username);
    
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ);
   
    if(password_verify($_POST['password'],$user->password))
        {
        echo "Lourd";
            header('Location: Wesa.html');
        }
    
    else{
            echo "Mdp correspond pas";
        }
    

