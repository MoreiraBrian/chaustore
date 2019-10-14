<?php session_start();
require_once 'admin/connect.php';
require_once 'activmdp.php';
$id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="index.php" title="Retour à l'accueil">Retour à l'accueil</a>
<form method="post">
<h2>Modification  de mot de passe:</h2>
<label for="oldmdp">Ancien mot de passe:</label>
<input type="password" name="oldmdp" placeholder="Ancien mot de passe">
<label for="mdp">Nouveau mot de passe:</label>
<input type="password" name="mdp" placeholder="Nouveau mot de passe">
<label for="mdp2">Confirmez nouveau mot de passe:</label>
<input type="password" name="mdp2" placeholder="Confirmez nouveau mot de passe">
<input type="submit" name="send" value="Confirmer">
<?php if(isset($error)){echo $error;} ?>
</form>
</body>
</html>