<?php session_start();
require_once 'admin/connect.php';
if(isset($_POST['accueil'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chaustore prisent en compte</title>
</head>
<body>
    <h2>Votre demande à bien étè prisent en compte.</h2>
    <p>Vous allez recevoir un mail pour vaus aider a récupérer votre mot de passe.</p>
    <form method="post">
        <input type="submit" name="accueil" value="Acceuil">
    </form>
</body>
</html>