<?php 
require_once 'config.php'; 

session_start(); 

    //Recuperer les POST
    $username = !empty($_POST['identifiant']) ? trim($_POST['identifiant']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $nom = !empty($_POST['nom']) ? trim($_POST['nom']) : null;
    $prenom = !empty($_POST['prenom']) ? trim($_POST['prenom']) : null;

    $sql = "UPDATE membres SET pseudo = :identifiant, password = :password, email = :email, nom = :nom, prenom = :prenom WHERE pseudo = :identifiant";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':identifiant', $username);
    $stmt->bindValue(':password', $pass);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':nom', $nom);
    $stmt->bindValue(':prenom', $prenom);
    
    $stmt->execute();
?>
