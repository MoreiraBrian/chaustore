<?php
$link = mysqli_connect("127.0.0.1","Brian","Bibinours1!");
$bdd = mysqli_select_db($link,"simplon_chaustore");
mysqli_set_charset($link,"utf8");
if(!$link){
    die("Erreur mysql");
}