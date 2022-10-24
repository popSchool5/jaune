<?php
session_start();
require('./components/co_bdd.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Le tchatche de bg</h1>
    <a href="listeUsers.php">Retourner liste User</a>
 
    <div class="messageEnvoyer"></div>
    <div class="messageRecu"></div>

    <form id="myForm" name="myForm">
        <input type="hidden" name="idR" value="<?= $_GET['id'] ?>">
        <input type="hidden" name="idEnvoyeur" value="<?= $_SESSION['id'] ?>">
        <input type="text" id="bg" placeholder="Pseudo" name="message"><br>
        <input type="submit" value="Inscription">
    </form>


    <script>
        let bg = document.querySelector('#bg');


        // // Pour recuperer les messages avec le fetch
        function bgbg() {
            let tab = []; 
            fetch('./t.php?id=' + <?= $_GET['id'] ?>)
                .then((response) => response.json())
                .then((data) => data.forEach(e => {
                    tab.push(e.id); 
                    console.log(tab);
                    if(!e.id.includes(tab)){
                        alert('nouveau message'); 
                    }
                }))


            // function t(r) {
            //     console.log(r);
            // }
        }

        setInterval(bgbg, 3000);
        




        // Pour envoyer dans la base de données les messages avec xmlhttprequest

        var myForm = document.getElementById('myForm');
        myForm.addEventListener('submit', (e) => {
            e.preventDefault();

            var data = new FormData(document.getElementById('myForm'));

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                // console.log(this);
                if (this.readyState == 4 && this.status == 200) {       
         
                    document.querySelector('.messageEnvoyer').innerHTML += this.response.message + '<br>';
                    bg.value = '';
                }
            };

            xhr.open("POST", "./insert.php", true);
            xhr.responseType = "json";
            // xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded'); 
            xhr.send(data);
            return false;
        })
    </script>
</body>

</html>​