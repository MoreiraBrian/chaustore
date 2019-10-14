<?php session_start();
require_once 'admin/connect.php';
if(isset($_POST['accueil'])){
    header("location: index.php");
}
if(isset($_POST['compte'])){
    header("location: compte.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chaustore modifications prisent en compte</title>
</head>
<body>
    <h2>Vos modifications ont bien étè prisent en compte.</h2>
    <form method="post">
        <input type="submit" name="accueil" value="Acceuil">
        <input type="submit" name="compte" value="Mon compte">
    </form>
</body>
</html>