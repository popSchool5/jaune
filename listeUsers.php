<?php
session_start();
if (empty($_SESSION)) {
    header('location: index.php');
}
require('./components/co_bdd.php');
$req = $bdd->query('SELECT * FROM users WHERE id !='. $_SESSION["id"]);
$users = $req->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <a href="./components/deconnexion.php">Déconnexion</a>


    <h1>Liste des utilisateurs : </h1>
    <ul>
        <?php foreach ($users as $user) : ?>
            <li>
                <a href="messagerie.php?id=<?= $user['id'] ?>"> <?= $user['name'] ?> </a>
            </li>
        <?php endforeach;  ?>
    </ul>
</head>

<body>

</body>

</html>