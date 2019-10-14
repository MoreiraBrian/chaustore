<?php require_once "admin/connect.php";
require_once "signup.php";


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="frontstyle.css">
    <title>Inscription</title>
</head>
<body>
    <main id="inscrit">
        <?php if(!isset($_POST['inscription'])){ ?>
        <form class="formulaire" method="post">
            <h2>Inscription:</h2>
            <label for="nom">Nom: </label>
            <input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])){echo $_POST['nom'];} ?>">
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" placeholder="Votre prénom" value="<?php if(isset($_POST['prenom'])){echo $_POST['prenom'];} ?>">
            <label for="adresse">Adresse compléte:</label>
            <input type="text" name="adresse" placeholder="Votre adresse" value="<?php if(isset($_POST['adresse'])){echo $_POST['adresse'];} ?>">
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
            <label for="email2">Confirmez votre email:</label>
            <input type="email" name="email2" placeholder="confirmation email" value="<?php if(isset($_POST['email2'])){echo $_POST['email2'];} ?>">
            <label for="mdp">Mot de passe:</label>
            <input type="password" name="mdp" placeholder="Votre mot de passe">
            <label for="mdp2">Confirmation mot de passe:</label>
            <input type="password" name="mdp2" placeholder="Confirmez votre mot de passe">
            <input type="submit" name="inscription" value="M'inscrire">
            <?php if(isset($error)){ echo "<p id='error'>".$error."</p>" ; } ?>
        </form>
        <?php }else{
            if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['adresse']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND ($_POST['email'] == $_POST['email2']) AND($_POST['mdp']==$_POST['mdp2']) AND filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){ ?>
            <div class="formulaire">
                <p id="Valide">
                Votre compte à été créer avec succes.
                </p>
                <p>
                    Vous aller recevoir un email de confirmation a l'adresse suivante: <?php echo $email ?>
                </p>
                <a href="index.php" alt="Retour a l'accueil">Retour a l'accueil</a>
            </div>
           <?php }
        } ?>

    </main>
</body>
</html>