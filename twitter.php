<?php
require "template/database.php";

// ETAPE 1 - PREPARATION (écrire code SQL)

$requete = $database->prepare("SELECT * FROM tweets");
$requete_2 = $database->prepare("SELECT * FROM utilisateur");

// ETAPE 2 - EXECUTION 

$requete->execute();
$requete_2->execute();


// ETAPE 3 - ON EN FAIT QLQ CHOSE 
// Toutes les données sous forme de tableau
// (PDO::FETCH_ASSOC) = tableau associatif donc associe une clé à une valeur

$allCourses = $requete->fetchALL(PDO::FETCH_ASSOC);
$allCourses_2 = $requete_2->fetchALL(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Poller+One&display=swap" rel="stylesheet">
            <title> TWITTER </title>
            <link rel="stylesheet" href="style.css">
        </head>

<body>
    
    <?php require "template/navigation.php"; ?>

    <main> 

        <form class="form" method="POST" action="insert_formulaire.php"> 
            <input type="text" name="nom" placeholder="nom" required>
            <input type="text" name="pseudo" placeholder="pseudo">
            <input type="text" name="mail" placeholder="mail">
            <input type="text" name="mdp" placeholder="mot de passe">
            <button type="submit">SEND</button>
        </form>

        <form class="form" method="POST" action="insert_tweet.php"> 
            <input type="text" name="tweet" placeholder="tweet" required>
            <button type="submit">SEND</button>
        </form>

    <?php foreach($allCourses as $tweet) { ?>
            <ul>
                <li><?= $tweet['tweet'] ?></li>
                    <form action="delete.php" method="POST">
                        <input type="hidden" name="supp" value="<?=$tweet['id']?>">
                        <button type="submit">DELETE</button>
                    </form>
                </li>
            </ul>
        <?php } ?>
    
    </main>

</body>
    </html>