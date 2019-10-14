<?php
require_once 'admin/connect.php';
if(isset($_POST['valider'])){
    if(!empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND $_POST['mdp'] == $_POST['mdp2']){
        $id = $_GET['id'];
        $mdp = sha1($_POST['mdp']);
        $chagereq = "UPDATE user SET password ='$mdp' WHERE id = '$id'";
        mysqli_query($link,$chagereq);
        header("location: modification.php");
    }else{
        $error ="Veuillez vérifier votre saisie:";
        if(empty($_POST['mdp'])){
            $error .= "Vous devez renseigner un mot de passe.";
        };
        if(empty($_POST['mdp2'])){
            $error .= "Vous devez confirmer votre mot de passe.";
        };
        if($_POST['mdp'] != $_POST['mdp2']){
            $error .= "Vos mots de passe ne corespondent pas.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Récupération de mot de passe</title>
</head>
<body>
    <h1>Chaustore récupération du mot de passe:</h1>
    <form method="post">
        <label for="mdp">Nouveau mot de passe:</label>
        <input type="password" name="mdp" placeholder="Nouveau mot de passe">
        <label for="mdp2">confirmez nouveau mot de passe:</label>
        <input type="password" name="mdp2" placeholder="Confirmation">
        <input type="submit" name="valider" value="Valider">
        <?php if(isset($error)){echo $error;} ?>
    </form>
</body>
</html>