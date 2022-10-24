<?php
session_start();
require('./components/co_bdd.php');
 echo json_encode($_POST); 


$req = "INSERT INTO messages(id_envoie,id_recoit,message) VALUES (?,?,?)"; 
$req = $bdd -> prepare($req);
$req -> execute([
    $_SESSION['id'],$_POST['idR'],$_POST['message']
]); 
