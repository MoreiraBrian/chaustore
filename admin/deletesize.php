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
            <h2>Voulez vous vraiment supprimer cette taille?</h2>
            <div>
            <input type="submit" name="suppr" value="Supprimer">
            <input type="submit" name="back" value="Retour">
            </div>
        </form>     
        <?php
        if(isset($_POST['back'])){
            header("location: gesttaille.php");
        };
        if(isset($_POST['suppr'])){
            $id = intval($_GET['id']);
           $delstock = "DELETE FROM stock WHERE size_id = '$id'";
           mysqli_query($link,$delstock);
           $delsize = "DELETE FROM size WHERE id = '$id'";
           mysqli_query($link,$delsize);
                    header("location: gesttaille.php");

        }
        ?>
        
    </main>  
</body>
</html>
