<?php session_start();  
if(isset($_SESSION['pseudo'])){
require_once "connect.php";
$prod = "SELECT product.id,product.name,brand.name,category.name, price,gender,product.image from brand, category join product where brand_id = brand.id and category_id = category.id ORDER BY id DESC";
$postprod = mysqli_query($link,$prod);
require_once "ajoutproduit.php";

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Gestion produit</title>
</head>
<body>
    <?php require_once "menu.php"; ?>
    <main>
        <h1>Gestion des produits</h1>
        <form id="product" method="post" action="" enctype="multipart/form-data">
            <h2>Ajouter un produit: </h2>
            <label for="nom">Nom du produit:</label>
            <input type="text" name="nom" placeholder="Nom du produit">
            <label for="marque">Marque:</label>
            <select name="marque">
                <?php $brand = "SELECT * from brand ORDER BY id DESC";
                        $postbrand = mysqli_query($link,$brand);
                        while ($brandname = mysqli_fetch_assoc($postbrand)){
                        echo "<option>".$brandname['name']."</option>";
                        }

                ?>        
            </select>
            <label for="category">Catégorie:</label>
            <select name="category">
                <?php $cat = "SELECT * from category ORDER BY id DESC";
                        $postcat = mysqli_query($link,$cat);
                        while ($catname = mysqli_fetch_assoc($postcat)){
                        echo "<option>".$catname['name']."</option>";
                        }

                ?>        
            </select>
            <label for="prix">Prix</label>
            <input type="text" name="prix" placeholder="000.00">
            <label for="genre">Genre:</label>
            <select name="genre">
                <option>F</option>
                <option>H</option>
                <option>M</option>
            </select>
            <label>Photo:(toutes vos images doivent être carrées)</label>
            <input id="image" type="file" name="image">
            <input type="submit" name="newprod" value="Valider">
            <?php if(isset($erreur)){echo $erreur;} ?>
        </form>
        <h2>Vos produits enregistés:</h2>
        
        <?php 
        while ($prodname = mysqli_fetch_array($postprod)){
            ?><div class='marque'><p><?php echo $prodname[1]." ".$prodname[2]." ".$prodname[3]." ".$prodname[4]." ";
            if($prodname[5] == 'H'){
                echo "Homme";
            }else if($prodname[5] == 'F'){
                echo "Femme";
            }else if($prodname[5] == 'M'){
                echo "Mixte";
            } ?></p>
            <?php 
            if (!empty($prodname[6])){
                echo "<img class='imgprod' src='images/$prodname[6]'>";
            }
            
            ?>
            
            <form method="post" action="">
            
            
            <input type="submit" name="changepage<?php echo $prodname[0]; ?>" value="Modifier">
            <input type="submit" name="del<?php echo $prodname[0]; ?>" value="Supprimer">
            </form>
              </div>
       <?php 
        if(isset($_POST['changepage'.$prodname[0]])){
            $id = $prodname[0];
        header("location: modifpro.php?id=".$id);
        }
        if(isset($_POST['del'.$prodname[0]])){
            $id = $prodname[0];
            header("location: deleteprod.php?id=".$id);
        }?>
    <?php }
    }else{
        header("location: index.php");
    }
?> 
        
        
    </main>  
    <script src="script.js"></script>
</body>
</html>