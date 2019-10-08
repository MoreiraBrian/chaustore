<?php

$size = "SELECT * from size ORDER BY id DESC";
$postsize = mysqli_query($link,$size);
if(isset($_POST["newadd"])){
    if(!empty($_POST['newsize'])){
    $newsize = htmlspecialchars($_POST['newsize']);
    $addsize = "INSERT INTO size (name) VALUES ('$newsize')";
    mysqli_query($link,$addsize);
    }else{
        $erreur1 ="<p id='erreur'>Vous devez marquer un nom</p>";
        
    }
}
