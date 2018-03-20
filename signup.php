<?php 
require_once 'config.php'; 
session_start();

if(isset($_POST['submit'])){

    //Recuperer les POST
    $username = !empty($_POST['identifiant']) ? trim($_POST['identifiant']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;

    //Hashage du MDP
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
    
    //Insert dans la BDD
    $sql = "INSERT INTO membres (pseudo, password, email) VALUES (:identifiant, :password, :email)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':identifiant', $username);
    $stmt->bindValue(':password', $passwordHash);
    $stmt->bindValue(':email', $email);
 
    $result = $stmt->execute();
    
    if($result){
        
        echo 'Félicitation vous avez un compte WESA !';
    }


}
    
?>
