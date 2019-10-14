<?php session_start();
require_once 'admin/connect.php';
require_once 'signin.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="frontstyle.css">
    <title>Document</title>
</head>
<body>
    <form class="formulaire" method="post">
        <h2>Connexion:</h2>
        <label for='email'>Email:</label>
        <input type="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
        <label for="mdp">Mot de passe:</label>
        <input type="password" name="mdp" placeholder="Mot de passe">
        <input type="submit" name="connect" value="Me connecter">
        <a href="" title="Mot de passe oublié.">Mot de passe oublié.</a>
    </form>
</body>
</html>