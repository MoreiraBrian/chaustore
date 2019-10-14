<?php
$id = $_SESSION['id'];
$recupinforeq = "SELECT * FROM user where id = '$id'";
$recupinfosend = mysqli_query($link,$recupinforeq);
$info = mysqli_fetch_array($recupinfosend);
if(isset($_POST['modif'])){
    if($_POST['nom'] != $info['last_name']){
        $newname = htmlspecialchars($_POST['nom']);
        $namereq = "UPDATE user SET last_name = '$newname' WHERE id = '$id'";
        mysqli_query($link,$namereq);
    };
    if($_POST['prenom'] != $info['first_name']){
        $newname = htmlspecialchars($_POST['prenom']);
        $namereq = "UPDATE user SET first_name = '$newname' WHERE id = '$id'";
        mysqli_query($link,$namereq);
    };
    if($_POST['adresse'] != $info['address']){
        $newname = htmlspecialchars($_POST['adresse']);
        $namereq = "UPDATE user SET address = '$newname' WHERE id = '$id'";
        mysqli_query($link,$namereq);
    };
    if($_POST['email'] != $info['email']){
        $newname = htmlspecialchars($_POST['email']);
        $namereq = "UPDATE user SET email = '$newname' WHERE id = '$id'";
        mysqli_query($link,$namereq);
    };
    header("location: modification.php");
}
if(isset($_POST['mdp'])){
    header("location: modifmdp.php");
}