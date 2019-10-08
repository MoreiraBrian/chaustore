<?php

$color = "SELECT * from color ORDER BY id DESC";
$postcolor = mysqli_query($link,$color);
if(isset($_POST["newadd"])){
    if(!empty($_POST['newcolor'])){
    $newcolor = htmlspecialchars($_POST['newcolor']);
    $addcolor = "INSERT INTO color (name) VALUES ('$newcolor')";
    mysqli_query($link,$addcolor);
    }else{
        $erreur1 ="<p id='erreur'>Vous devez marquer un nom</p>";
        
    }
}
