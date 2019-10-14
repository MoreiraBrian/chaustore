<?php
if(isset($_POST['send'])){
    if(!empty($_POST['oldmdp']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND $_POST['mdp'] == $_POST['mdp2']){
        $oldmdp = sha1($_POST['oldmdp']);
        $mdp = sha1($_POST['mdp']);
        $recupmdpreq = "SELECT password FROM user where id = '$id'";
        $recupmdpsend = mysqli_query($link,$recupmdpreq);
        $recup = mysqli_fetch_array($recupmdpsend);
        if($oldmdp == $recup['password']){
            $newmdpreq = "UPDATE user SET password = '$mdp' WHERE id = '$id'";
            mysqli_query($link,$newmdpreq);
            header("location: modification.php");
        }else{
            $error = "Mauvais mot de passe actuel.";
        }
    }else{
        $error = "Vous devez remplir tous les champs.<br>";
        if(empty($_POST['oldmdp'])){
            $error .= "Vous devez donner votre encien mot de passe.<br>";
        };
        if(empty($_POST['mdp'])){
            $error .= "Vous devez donner votre nouveau mot de passe.<br>";
        };
        if(empty($_POST['mdp2'])){
            $error .= "Vous devez confirmer votre nouveau mot de passe.<br>";
        };
        if($_POST['mdp'] != $_POST['mdp2']){
            $error .= "Vos nouveau mots de passes doivent correspondre.";
        }
    }
}