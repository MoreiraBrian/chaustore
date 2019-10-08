<?php session_start();
if(isset($_POST['connect'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp']) AND $_POST['pseudo'] == "admin" AND $_POST['mdp'] == "admin"){
       $_SESSION['pseudo'] = "admin";
        header("location: gestmarque.php");
    }else{
        $erreur = "<p id='erreur'>Tous les champs doivent être complétés avec les bonnes informations.</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Back office</title>
</head>
<body>
    <main>
        <h1>Bienvenue sur l'espace administrateur</h1>
    <form method="post">
        <input type="text" name="pseudo" placeholder="Identifiant">
        <input type="password" name="mdp" placeholder="Mot de passe">
        <input type="submit" name="connect" value="Me connecter">
        <?php if(isset($erreur)){echo $erreur;} ?>
    </form>
    </main>
</body>
</html>