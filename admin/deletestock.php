<?php  
require_once "connect.php";


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title></title>
</head>
<body>
    <?php require_once "menu.php"; ?>
    <main>
       <form id="product" method="post" action="">
            <h2>Voulez vous vraiment supprimer ce stock?</h2>
            <div>
            <input type="submit" name="suppr" value="Supprimer">
            <input type="submit" name="back" value="Retour">
            </div>
        </form>     
        <?php
        if(isset($_POST['back'])){
            header("location: geststock.php");
        };
        if(isset($_POST['suppr'])){
            $id = intval($_GET['id']);
            $idsize = intval($_GET['idsize']);
            $idcolor = intval($_GET['idcolor']);
           $delstock = "DELETE FROM stock WHERE product_id = '$id' and size_id = '$idsize'";
           mysqli_query($link,$delstock);
           header("location: geststock.php");
        

        }
        ?>
        
    </main>  
</body>
</html>
