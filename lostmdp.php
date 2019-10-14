<?php
require_once 'admin/connect.php';
if(isset($_POST['valider'])){
    if(!empty($_POST['email'])){
        $email = htmlspecialchars($_POST['email']);
        $verfireq = "SELECT count(id) from user WHERE email = '$email'";
        $verifsend = mysqli_query($link,$verfireq);
        $verif = mysqli_fetch_row($verifsend);
        if($verif[0] == 1){
            $verfireq = "SELECT id from user WHERE email = '$email'";
        $verifsend = mysqli_query($link,$verfireq);
        $verif = mysqli_fetch_row($verifsend);
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = "from:chaustore";
            mail($email,"Récuperation de mot de passe","<p>Bonjour vous avez demander à changer de mot de passe suite à un oubli de ce dernier.</p> <p>Pour modifier votre mot de passe veuillez cliquer sur le lien suivant: <a href='127.0.0.1/chaustore/recuperation.php?id=$verif[0]'>Récuperer un mot de passe</a></p>  <p>Si vous n'étes pas l'auteur de cette demande veuillez ignorer ce mail.</p> <p>L'équipe de Chaustore vous souhaite une bonne journée.</p>",implode("\r\n", $headers));
            header("location: confirmail.php");
        }else{
            $error ="Il n'y as aucun compte associé a cette adresse email.";
        }
    }else{
        $error = "Vous devez nous donner votre email.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chaustore récupération de mot de passe</title>
</head>
<body>
<a href="index.php" title="Retour à l'accueil">Retour à l'accueil</a>
    <h2>Mot de passe oublié:</h2>
    <form method="post">
    <label for="email">Votre email:</label>
    <input type="email" name="email" placeholder="Votre email">
    <input type="submit" name="valider" value="Récupérer mon mot de passe">
    <?php if(isset($error)){echo $error;} ?>
    </form>
</body>
</html>