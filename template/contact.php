<?php
session_start();
ob_start();
include $_SERVER['DOCUMENT_ROOT']."/fct_proto.php";
?>

<?php
    if ($_SERVER['REQUEST_METHOD']=='POST') 
    {
      $nom = htmlentities($_POST["nom"]);
      $mail = htmlentities($_POST["mail"]);
      $message = htmlentities($_POST["message"]);
     
      $destinataire = "hwolff@student.42.fr";
      $contenu .= '<p>Tu as un nouveau message !</p>';
      $contenu .= '<p><strong>Nom</strong>: '.$nom.'</p>';
      $contenu .= '<p><strong>Email</strong>: '.$mail.'</p>';
      $contenu .= '<p><strong>Message</strong>: '.$message.'</p>';
      $contenu .= '</body></html>';
     
      $headers = 'MIME-Version: 1.0'."\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
     
      $objet = "Vous avez un message de $nom";
      mail($destinataire, $objet, $contenu, $headers);
      echo "Mail envoyé! Nous vous répondrons très vite";  
    }
?>

<div class="login-page contact">
    <div class="form contact" >
        <form class="login-form" method="POST">
            <input type="text" name="nom" placeholder="Votre nom"/>
            <input type="text" name="mail" placeholder="Votre email"/>
            <input class="mail" type="textarea" name="message" placeholder="Votre message"/>
            <button type="submit">Envoyez!</a></button>
        </form>
	</div>
</div>

<?php
$content_for_layout = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT']."/layout.php";
?>