<?php
require_once "connect.php";
$reqstock = "SELECT product.id,product.name,brand.name,color.name,category.name, price,gender,size.name,stock,size_id from brand,color,category,product,size join stock where brand_id = brand.id and color_id = color.id and category_id = category.id and product_id = product.id and size_id = size.id ORDER BY product_id DESC";
$envoistock = mysqli_query($link,$reqstock); 
if(isset($_POST['addstock'])){
    
    $color = $_POST['couleur'];
    $colorreq = "SELECT * FROM color where name = '$color'";
    $colorsend = mysqli_query($link,$colorreq);
    $row = mysqli_fetch_array($colorsend);
    echo $row[0];
    $prodname = $_POST['productname'];
    echo $prodname;
    $prodidreq = "SELECT * FROM product where name = '$prodname' and color_id = '$row[0]'";
    $prodidsend = mysqli_query($link,$prodidreq);
    $prodid = mysqli_fetch_array($prodidsend);
    

    
}









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
    <form method="post" id="product" action="">
            <h2>Ajouter du stock:</h2>
            <label for="productname">Produit:</label>
                <select name="productname">
                <?php 
                $productreq = "SELECT * from product";
                $productenvoi = mysqli_query($link,$productreq);
                while($product = mysqli_fetch_assoc($productenvoi)){
                    echo "<option>".$product['name']."</option>";
                }
                ?>
                </select>
                <label for="couleur">Couleur:</label>
            <select name="couleur">
                <?php $color = "SELECT * from color ORDER BY id DESC";
                        $postcolor = mysqli_query($link,$color);
                        while ($colorname = mysqli_fetch_array($postcolor)){
                        echo "<option>".$colorname['1']."</option>";
                        }?>        
            </select>
               
            <input type="submit" name="addstock" value="Ajouter">
                 </form>
    </main>  
 
</body>
</html>