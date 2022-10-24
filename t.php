<?php
session_start(); 

require('./components/co_bdd.php'); 
// Recuperer la liste des messages
$req = "SELECT * FROM messages WHERE (id_envoie = ? OR id_recoit = ? ) AND (id_envoie = ? OR id_recoit = ?) ORDER BY id asc";
$res = $bdd->prepare($req);
$res -> execute([
   $_GET['id'],$_GET['id'],$_SESSION['id'],$_SESSION['id'] 
]); 
$users = $res->fetchAll();

$u = [];
foreach ($users as $user) {
    $u[] = $user;
}
echo json_encode($u);