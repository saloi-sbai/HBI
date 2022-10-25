<?php
var_dump($_SESSION);
session_start();
if (isset($_POST['envoyer'])) {
    //extraction des variables
    extract($_POST);
    //je verifie si les variables existent et ne sont pas vides
    if (
        isset($nom) && $nom != "" &&
        isset($email) && $email != "" &&
        isset($message) && $message != ""
    ) {
        // envoyé l'email
        //mon adresse mail (le destinataire)    
        $to = "saloi.benoumaizina@free.fr";
        // objet du mail
        $subject = "vous avez reçu un message de : " . $email;

        $message = "
<p>vous avez reçu un message de <strong> " . $email . "</strong></p>
<p><strong>Nom :</strong> " . $nom . "</p>
<p><strong>Email :</strong> " . $email . "</p>
<p><strong>Message :</strong> " . $message . "</p>
";


        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <' . $mail . '>' . "\r\n";

        // envoie du mail
        $envoyer = mail($to, $subject, $message, $headers);

        // verification de l'envoie
        if ($envoyer) {
            $_SESSION['succes_message'] = "message envoyé";
            // redirection vers la meme page
            header("location:contact.php");
        } else {
            $info = "message non envoyé";
        }
    } else {
        // si elle sont vides
        $info = "veuillez remplir tous les champs";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
</head>

<body>
    <?php
    //afficher le message d'erreur
    if (isset($info)) { ?>
        <p class="request_message" style="color:red">
            <?= $info ?>
        </p>

    <?php

    }

    ?>

    <?php
    //afficher le message de succes
    if (isset($_SESSION['succes_message'])) { ?>
        <p class="request_message" style="color:green">
            <?= $_SESSION['succes_message'] ?>
        </p>

    <?php

    }

    ?>

    <form method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="nom" id="name" placeholder="Nom" required />
            <br />
            <input type="email" class="form-control" name="email" id="email" placeholder="email" required />
            <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="message" required></textarea>
        </div>
        <button name="envoyer" type="submit" class="submit-btn">Envoyer</button>
    </form>

</body>

</html>