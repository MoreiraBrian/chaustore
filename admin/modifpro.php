<?php
require_once "connect.php";
$id = $_GET['id'];
$prod = "SELECT product.id,product.name,brand.name,category.name, price,gender from brand, category join product where brand_id = brand.id and category_id = category.id and product.id = '$id'";
$postprod = mysqli_query($link,$prod);
$prodname = mysqli_fetch_array($postprod);




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
            <form id="product" method="post" action="" enctype="multipart/form-data">
            
            <label for="nom<?php echo $prodname[0]; ?>">Nom du produit:</label>
            <input type="text" name="nom<?php echo $prodname[0];?>" placeholder="Nom du produit" value="<?php echo $prodname[1];?>">
            <label for="marque<?php echo $prodname[0]; ?>">Marque:</label>
            <select name="marque<?php echo $prodname[0]; ?>">
                <?php $brand = "SELECT * from brand ORDER BY id DESC";
                        $postbrand = mysqli_query($link,$brand);
                        while ($brandname = mysqli_fetch_assoc($postbrand)){
                            if($brandname['name'] == $prodname[2]){
                        echo "<option selected='selected'>".$brandname['name']."</option>";
                        }else{
                            echo "<option>".$brandname['name']."</option>";
                        }
                    }

                ?>        
            </select>
            <label for="category<?php echo $prodname[0]; ?>">Catégorie:</label>
            <select name="category<?php echo $prodname[0]; ?>">
                <?php $cat = "SELECT * from category ORDER BY id DESC";
                        $postcat = mysqli_query($link,$cat);
                        while ($catname = mysqli_fetch_assoc($postcat)){
                            if($catname['name'] == $prodname[3]){
                                echo "<option selected='selected'>".$catname['name']."</option>";
                            }else{
                        echo "<option>".$catname['name']."</option>";
                            }
                        }

                ?>        
            </select>
            <label for="prix<?php echo $prodname[0]; ?>">Prix</label>
            <input type="text" name="prix<?php echo $prodname[0]; ?>" placeholder="000.00" value="<?php echo $prodname[4]; ?>">
            <label for="genre<?php echo $prodname[0]; ?>">Genre:</label>
            <select name="genre<?php echo $prodname[0]; ?>">
                <option <?php if($prodname['gender']== "F"){echo "selected ='selected'";} ?>>F</option>
                <option <?php if($prodname['gender']== "H"){echo "selected ='selected'";} ?>>H</option>
                <option <?php if($prodname['gender']== "M"){echo "selected ='selected'";} ?>>M</option>
            </select>
            <label>Photo: (toutes vos images doivent être carrées)</label>
            <input id="image" type="file" name="image<?php echo $prodname[0]; ?>">
            
            <input type="submit" name="changeprod<?php echo $prodname[0]; ?>" value="Modifier">
            </form>
              </div>
              <?php
                     if(isset($_POST['changeprod'.$prodname[0]])){
                        $marque = $_POST['marque'.$prodname[0]];
                        $marquereq = "SELECT * FROM brand where name = '$marque'";
                        $marquesend = mysqli_query($link, $marquereq);
                        $resultmarque = mysqli_fetch_assoc($marquesend);
                        $idmarque = intval($resultmarque['id']);
                        $cat = $_POST['category'.$prodname[0]];
                        $catreq = "SELECT * FROM category where name = '$cat'";
                        $catsend = mysqli_query($link, $catreq);
                        $resultcat = mysqli_fetch_assoc($catsend);
                        $idcat = intval($resultcat['id']);
                        $prix = floatval($_POST['prix'.$prodname[0]]);
                        $nom = $_POST['nom'.$prodname[0]];
                        $genre = $_POST['genre'.$prodname[0]];
                        $id = intval($prodname[0]);
                        if(!empty($_POST['prix'.$prodname[0]]) AND !empty($_POST['nom'.$prodname[0]])){
                            if (isset($_FILES["image".$prodname[0]]) AND !empty($_FILES["image".$prodname[0]]["name"])){
                                $taillemax = 2097157;
                                $extentionvalide = array('jpg','jpeg','gif','png');
                                if($_FILES['image'.$prodname[0]]['size'] <= $taillemax){
                                        $extentionupload = strtolower(substr(strrchr($_FILES['image'.$prodname[0]]['name'],'.'), 1));
                                        if(in_array($extentionupload, $extentionvalide)){
                                            $chemin = "images/".$nom.'.'.$extentionupload;
                                            $resultat = move_uploaded_file($_FILES['image'.$prodname[0]]['tmp_name'],$chemin);
                                            if($resultat){
                                            $name = htmlspecialchars($_FILES['image'.$prodname[0]]['name']);
                                            $changeimagereq = "UPDATE product SET image = '$nom.$extentionupload' where id = '$id'";
                                            mysqli_query($link,$changeimagereq);
                                               }else{
                                                    echo "Oups il y à eu un probléme.";
                                                
                                            }
                                       }else{
                                        echo "Votre photo doit être en jpg, jpeg , gif ou png.";
                                    
                                }
                                   }else{
                                       echo "Votre photo est trop volumineuse.";
                                   }
                                            }else{echo "Tous les champs doivent être remplis.";};
                            $newprodreq = "UPDATE product SET name='$nom' , brand_id='$idmarque' , category_id='$idcat' , price='$prix' , gender='$genre' where id = '$id'";
                            mysqli_query($link,$newprodreq);
                            header("location: gestionproduit.php");
                            }else {echo "Tous les champs doivent être complété";};
                        };
                        ?>
                         </main>  
    <script src="script.js"></script>
</body>
</html>
