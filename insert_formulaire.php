<h1>Formulaire utilisateur</h1>

<ul>

    <li>
        <?= $_POST['nom']?>
    </li>

    <li>
        <?= $_POST['pseudo']?>
    </li>

    <li>
        <?= $_POST['mail']?>
    </li>

    <li>
        <?= $_POST['mdp']?>
    </li>

    <li>
        <img src="https://fastly.picsum.photos/id/64/4326/2884.jpg?hmac=9_SzX666YRpR_fOyYStXpfSiJ_edO3ghlSRnH2w09Kg" alt="photo id">
    </li>

</ul>




<?php 

require 'template/database.php';
$insert = $database->prepare("INSERT INTO utilisateur (nom, pseudo, mail, mdp, photo) VALUES (:thename, :theuser, :theemail, :thepassword, :thepicture)");

//Pour twitter il y aura qu'une seule valeur. 

$insert->execute(
    [
        ":thename" => $_POST['nom'],
        ":theuser" => $_POST['pseudo'],
        ":theemail" => $_POST['mail'],
        ":thepassword" => $_POST['mdp'],
        ":thepicture" => "https://fastly.picsum.photos/id/64/4326/2884.jpg?hmac=9_SzX666YRpR_fOyYStXpfSiJ_edO3ghlSRnH2w09Kg",
    ]
);

