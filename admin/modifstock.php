<?php
require_once "connect.php";
$reqstock = "SELECT product.id,product.name,brand.name,color.id,color.name,category.name, price,gender,size.name,stock,size_id from brand,color,category,product,size join stock where brand_id = brand.id and color_id = ".$_GET['idcolor']." and category_id = category.id and product_id = ".$_GET['id']." and size_id = ".$_GET['idsize']." ORDER BY product_id DESC";
$envoistock = mysqli_query($link,$reqstock);
$stockid = mysqli_fetch_array($envoistock); 










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
        <h1>Modification du stock:</h1>
        <form method="post" id="product">
            <label for="quant">Quantité:</label>
            <input type="text" name="quant" value="<?php echo $stockid[9];?>">
            <input type="submit" name="addstock" value="Modifier">
                 </form>
                 <?php 
                 if(isset($_POST['addstock'])){
                    if(!empty($_POST['quant'])){
                        $stock = intval($_POST['quant']);
                        $idprod = $_GET['id'];
                        $idsize = $_GET['idsize'];
                        $idcolor = $_GET['idcolor'];
                    $total = "UPDATE stock SET `stock` = '$stock' where product_id ='$idprod' and color_id = '$idcolor' and size_id = '$idsize'";
                    mysqli_query($link,$total);
                    header("location: geststock.php");
                }
                }
                 ?>

      
       
        
    </main>  
 
</body>
</html>
