<?php session_start();
require_once 'admin/connect.php';
require_once 'modifcompte.php';
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
    <?php if(isset($_SESSION['id'])){ ?>
    <a href="index.php" title="Retour à l'accueil">Retour à l'accueil</a>
    <form class="formulaire" method="post">
        <h2>Mes informations:</h2>
            <label for="nom">Nom: </label>
            <input type="text" name="nom" placeholder="Votre nom" value="<?php echo $info['last_name']; ?>">
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" placeholder="Votre prénom" value="<?php echo $info['first_name']; ?>">
            <label for="adresse">Adresse compléte:</label>
            <input type="text" name="adresse" placeholder="Votre adresse" value="<?php echo $info['address']; ?>">
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="email" value="<?php echo $info['email']; ?>">
            <input type="submit" name="mdp" value="Modifier mon mot de passe">
            <input type="submit" name="modif" value="Modifier">
    </form>
    <?php }else{
        header("location: index.php");
    } ?>
</body>
</html>