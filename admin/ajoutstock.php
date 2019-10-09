<?php
if(isset($_POST['addstock'])){
    if(!empty($_POST['quant'])){
    $color = htmlspecialchars($_POST['couleur']);
    $colorreq = "SELECT id FROM color where name = '$color'";
    $colorsend = mysqli_query($link,$colorreq);
    $idcolorwell = mysqli_fetch_array($colorsend);
    $idcolor = intval($idcolorwell[0]);
    echo $idcolor;
    $prodname = $_POST['productname'];
    $prodidreq = "SELECT * FROM product where name = '$prodname'";
    $prodidsend = mysqli_query($link,$prodidreq);
    $prodid = mysqli_fetch_array($prodidsend);
    $idprod = intval($prodid[0]);
    echo $idprod;
    $nomsize = htmlspecialchars($_POST['size']);
    $sizered = "SELECT id FROM size where name = '$nomsize'";
    $sizeenvoi= mysqli_query($link,$sizered);
    $sizeid = mysqli_fetch_array($sizeenvoi);
    $idsize = intval($sizeid[0]);
    echo $idsize;
    $stock = intval($_POST['quant']);
    echo $stock;
    $total = "INSERT INTO stock (product_id,color_id,size_id,stock) VALUES ('$idprod','$idcolor','$idsize','$stock')";
    mysqli_query($link,$total);
    header("location: geststock.php");

    }   else{
        $erreur = "tous les champs doivent être complétés.";
    }
}