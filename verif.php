<?php     
require_once 'config.php'; 
session_start(); 

$username = !empty($_POST['identifiant']) ? trim($_POST['identifiant']) : null;
    $sql = "SELECT pseudo FROM membres WHERE pseudo = :identifiant";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':identifiant', $username);
    
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
   if($row >0 ){echo "exists";}
   else{echo "notexists";}