<?php

$cat = "SELECT * from category ORDER BY id DESC";
$postcat = mysqli_query($link,$cat);
if(isset($_POST["newadd"])){
    if(!empty($_POST['newcat'])){
    $newcat = htmlspecialchars($_POST['newcat']);
    $addcat = "INSERT INTO category (name) VALUES ('$newcat')";
    mysqli_query($link,$addcat);
        
    }
        

}