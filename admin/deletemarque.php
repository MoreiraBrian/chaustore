<?php  
require_once "connect.php";
require_once "marque.php";


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
            <h2>Voulez vous vraiment supprimer cette marque?<br>Si vous la supprimez, tous les produits qui sont lier seront supprimer aussi.</h2>
            <div>
            <input type="submit" name="suppr" value="Supprimer">
            <input type="submit" name="back" value="Retour">
            </div>
        </form>     
        <?php
        if(isset($_POST['back'])){
            header("location: gestmarque.php");
        };
        if(isset($_POST['suppr'])){
            $id = intval($_GET['id']);
            $selectprod ="SELECT id from product where brand_id = '$id'";
            $prodsup = mysqli_query($link,$selectprod);
            while($row = mysqli_fetch_array($prodsup)){
                $prodid = intval($row[0]);
            $avant = "DELETE FROM stock where product_id = '$prodid'";
                        mysqli_query($link,$avant);
            }
                        
                    $del = "DELETE FROM product WHERE brand_id = '$id'";
                    mysqli_query($link,$del);
                    $delmar = "DELETE FROM brand WHERE id = '$id'";
                    mysqli_query($link,$delmar);
                    header("location: gestmarque.php");

        }
        ?>
        
    </main>  
</body>
</html>