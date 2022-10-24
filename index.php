<?php
session_start();
require('./components/co_bdd.php'); 
if (isset($_GET['sess']) && $_GET['sess'] =="co") {

    $req = $bdd->prepare("SELECT * FROM users WHERE email = ?");
    $req->execute([
        $_POST['email']
    ]);
    $user = $req->fetch();
    if($user){
        if(password_verify($_POST['password'],$user['password'])){

            $_SESSION['name'] = $user['name'];
            $_SESSION['id']   = $user['id'];
            $_SESSION['email']   = $user['email'];
            header('location: listeUsers.php');
        }
    }

}elseif(isset($_GET['sess']) && $_GET['sess']=='insc'){
    echo "EE"; 
    $req = $bdd -> prepare('INSERT INTO users (name,email,password) VALUES (?,?,?)'); 
    $req -> execute([
        $_POST['nom'],$_POST['email'], password_hash($_POST['password'],PASSWORD_BCRYPT)
    ]); 
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Connexion</h1>
    <form action="index.php?sess=co" method="post">
        <input type="text" name="email" placeholder="ton email">
        <input type="text" name="password" placeholder="ton mdp">
        <input type="submit">
    </form>

    <h1>Connexion</h1>
    <form action="index.php?sess=insc" method="post">
        <input type="text" name="nom" placeholder="ton nom">
        <input type="text" name="email" placeholder="ton email">
        <input type="text" name="password" placeholder="ton mdp">
        <input type="submit">
    </form>


</body>

</html>