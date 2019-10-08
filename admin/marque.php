<?php

$brand = "SELECT * from brand ORDER BY id DESC";
$postbrand = mysqli_query($link,$brand);
if(isset($_POST["newadd"])){
    if(!empty($_POST['newmarque'])){
    $newmarque = htmlspecialchars($_POST['newmarque']);
    $addmarque = "INSERT INTO brand (name) VALUES ('$newmarque')";
    mysqli_query($link,$addmarque);}else{
        $erreur =" <p id='erreur'>Vous devez marquer un nom</p>";
        
    }
}
