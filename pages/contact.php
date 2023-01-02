<?php
session_start();
$_SESSION = [];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require './DotEnv.php';

(new DotEnv('../.env'))->load();

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

// recuperation des informations du formulaire
$nom = $_POST["nom"];
$expediteur = $_POST["email"];
$message = $_POST["message"];

// configuration serveur
// pour securiser mon serveur mail pour eviter qu'ils me volent mes identifiants et qu'ils font du spam avec mon compte,j'ai crée un fichier .env pour metre mes donnée sensible, j'ai ajouté mon fichier .env au gitignore pour éviter de l'envoyer sur github.
try {
    //Server settings
    $mail->SMTPDebug = 0;                         //Enable verbose debug output
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = getenv('HOST');           //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                     //Enable SMTP authentication
    $mail->Username   = getenv('ADDRESS');        //SMTP username
    $mail->Password   = getenv('ADDRESS_PASS');   //SMTP password
    $mail->SMTPSecure = getenv('SECURITE');       //Enable implicit TLS encryption
    $mail->Port       = getenv('PORT');           //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';


    if (isset($_POST['envoyer'])) {

        if (
            !empty($nom) && !empty($expediteur) && !empty($message)
        ) {

            //Recipients
            $mail->setFrom('saloi.benoumaizina@free.fr', 'hbi');
            $mail->addAddress('saloi.benoum@gmail.com');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject =
                "vous avez reçu un message de : " . $email;
            $mail->Body    = '
                <p>vous avez reçu un message de 
                <strong> ' . $email . '</strong></p>
                <p><strong>Nom :</strong> ' . $nom . '</p>
                <p><strong>Email :</strong> ' . $expediteur . '</p>
                <p><strong>Message :</strong> ' . $message . '</p>
                ';


            $mail->send();
            $_SESSION['succes_message'] = "Message envoyé avec success !";
            header('location: contact-form.php');
        } else {
            // si elle sont vides
            $_SESSION['error'] = "Veuillez remplir tous les champs.";
            header('location: contact-form.php');
        }
    }
} catch (Exception $e) {
    $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header('location: contact-form.php');
}
