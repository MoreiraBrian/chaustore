<?php
require_once "connect.php";
$id = $_GET['id'];
$prod = "SELECT product.id,product.name,brand.name,color.name,category.name, price,gender from brand, category, color join product where brand_id = brand.id and color_id = color.id and category_id = category.id and product.id = '$id'";
$postprod = mysqli_query($link,$prod);




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
            <h2>Voulez vous vraiment supprimer ce produit?</h2>
            <div>
            <input type="submit" name="suppr" value="Supprimer">
            <input type="submit" name="back" value="Retour">
            </div>
        </form>
              </div>
              <?php
                     if(isset($_POST['suppr'])){
                        $id = intval($_GET['id']);
                        $avant = "DELETE FROM stock where product_id = '$id'";
                        mysqli_query($link,$avant);
                    $del = "DELETE FROM product WHERE id = '$id'";
                    mysqli_query($link,$del);
                    header("location: gestionproduit.php");
                     }
                     if(isset($_POST['back'])){
                        header("location: gestionproduit.php");   
                     }
                    
                        ?>
                         </main>  
    <script src="script.js"></script>
</body>
</html>
