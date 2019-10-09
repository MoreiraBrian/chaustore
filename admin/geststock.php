<?php session_start();  
if(isset($_SESSION['pseudo'])){
require_once "connect.php";
$reqstock = "SELECT product.id,product.name,brand.name,color.id,color.name,category.name, price,gender,size.name,stock,size.id from brand,color,category,product,size join stock where color_id = color.id and category_id = category.id and product_id = product.id and size_id = size.id and brand_id=brand.id ORDER BY product_id DESC, size_id";
$envoistock = mysqli_query($link,$reqstock); 
require_once "ajoutstock.php";



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
        <h1>Gestion des stocks:</h1>
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
                <label for="size">Taille:</label>
                <select name="size">
                <?php 
                $sizereq = "SELECT * from size";
                $sizeenvoi = mysqli_query($link,$sizereq);
                while($product = mysqli_fetch_assoc($sizeenvoi)){
                    echo "<option>".$product['name']."</option>";
                }
                ?>    
            </select>
            <label for="quant">Quantité:</label>
            <input type="text" name="quant" placeholder="Quantité">
            <input type="submit" name="addstock" value="Ajouter">
            <?php if(isset($erreur)){echo $erreur;} ?>
                 </form>
                 
        <h2>Vos stocks:</h2>
        
        <?php
        while ($prodname = mysqli_fetch_array($envoistock)){
            ?><div class='marque'><p><?php echo $prodname[1]." ".$prodname[2]." ".$prodname[4]." ".$prodname[5]." ".$prodname[6]." euros pour ";
            if($prodname[7] == 'H'){
                echo "Homme";
            }else if($prodname[7] == 'F'){
                echo "Femme";
            }else if ($prodname[7] == 'M'){
                echo "Mixte";
            };
            echo " taille ".$prodname[8]." quantité: ".$prodname[9]; ?></p>
            
            <form method="post" action="">
            
            
            <input type="submit" name="changepage<?php echo $prodname[0].$prodname[10].$prodname[3]; ?>" value="Modifier">
            <input type="submit" name="del<?php echo $prodname[0].$prodname[10].$prodname[3]; ?>" value="Supprimer">
            </form> 
              </div>
              <?php 
        if(isset($_POST['changepage'.$prodname[0].$prodname[10].$prodname[3]])){
            $id = $prodname[0];
            $idsize = $prodname[10]; 
            $idcolor = $prodname[3];
        header("location: modifstock.php?id=".$id."&idsize=".$idsize."&idcolor=".$idcolor);
        };
        if(isset($_POST['del'.$prodname[0].$prodname[10].$prodname[3]])){
            $id = $prodname[0];
            $idsize = $prodname[10];
            $idcolor = $prodname[3];
            header("location: deletestock.php?id=".$id."&idsize=".$idsize."&idcolor=".$idcolor);
        }?>
        <?php }
        }else{
            header("location: index.php");
        } ?>
    </main>  
 
</body>
</html>