<?php
require_once "admin/connect.php";
$product_req = "SELECT product.id,product.name,brand.name,category.name, price,gender,product.image from brand, category join product where brand_id = brand.id and category_id = category.id ORDER BY id DESC";
$product_send = mysqli_query($link,$product_req);
if($product_req === false){
    echo "Vos produits ne peuvent être charger pour le moment";
}



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="frontstyle.css">
    <title>Chaustore</title>
</head>
<body>
<header>
        <h1>Bienvenue sur Chaustore la boutique de chausure pour tous les goûts.</h1>
        <?php if(!isset($_SESSION)){ ?>
            <a href="" title="Connexion"><div>Me connecter</div></a>
            <a href="inscription.php" title="Inscription"><div>Creer un compte</div></a>
        <?php }else{ ?>
            <a href="" title="Mon compte"><div>Mon compte</div></a>
            <a href="" title="déconnection"><div>Me deconnecter</div></a>
        <?php } ?>
</header> 
 <main>
     <?php while($product = mysqli_fetch_array($product_send)){
         $stock_req = "SELECT SUM(stock) from stock where product_id='$product[0]'";
         $stock_send = mysqli_query($link,$stock_req);
         $stock = mysqli_fetch_array($stock_send);
         ?>
        <a class="productpage" href="product.php?id=<?php echo $product[0] ?>"><div class="product">
        <img class="productimage" src="admin/images/<?php echo $product[6]; ?>">
        <h2><?php echo $product[1]." ".$product[2]; ?></h2>
        <p><?php echo $product[3]." ";
        if($product[5] == 'H'){
            echo "Homme";
        }else if($product[5] == 'F'){
            echo "Femme";
        }else if($product[5] == 'M'){
            echo "Mixte";
        } ?></p>
        <p>Prix: <?php echo $product[4]; ?> € </p>
        <?php if($stock[0] === NULL){
            echo "<p class='no_stock'> Ce produit n'est plus disponible. </p>";
        };
        if($stock[0]<= 10 AND $stock[0]>0){
            echo "<p class='less_stock'> Ce produit est presque épuisé. </p>";
        };
        if($stock[0]>10){
            echo "<p class='stock'> Ce produit est disponible. </p>";
        } ?>
        </div></a>
     <?php } ?>
</main>  
</body>
</html>