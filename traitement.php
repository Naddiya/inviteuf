<?php
$msg_erreur = "Erreur !!!! Erreur !!! Au secours !!!! On panique !!!!";
$msg_ok = "Votre demande a bien été prise en compte.";
$message = $msg_erreur;

define('invit.nad@gmail.com','webmaster@https://naddiya.github.io/inviteuf/'); // remplacer par votre email
define('MAIL_SUJET','Formulaire invité');


// vérification des champs
if (empty($_POST['nom'])) 
$message .= "Ton nom :<br/>";

if (empty($_POST['howmuch'])) 
$message .= "Vous serez :<br/>";

if (empty($_POST['message'])) 
$message .= "Ton message :<br/>";

if (strlen($message) > strlen($msg_erreur)) {
    echo $message; die();
  }

foreach($_POST as $index => $valeur) {
    $$index = stripslashes(trim($valeur));
  }

//Préparation de l'entête du mail:
$mail_entete  = "MIME-Version: 1.0\r\n";
$mail_entete .= "From: {$_POST['nom']}";
$mail_entete .= "Content-Type: text/plain";
$mail_entete .= "\r\nContent-Transfer-Encoding: 8bit\r\n";
$mail_entete .= 'X-Mailer:PHP/' . phpversion()."\r\n";

// envoi du mail
if (mail(MAIL_DESTINATAIRE,MAIL_SUJET,$mail_corps,$mail_entete)) {
    //Le mail est bien expédié
    echo $msg_ok;
  } else {
    //Le mail n'a pas été expédié
    echo "C'est qui qu'a codé n'importe quoi ???? C'est NADIA !";
  }

?>