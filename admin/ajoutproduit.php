<?php
if(isset($_POST['newprod'])){
    $marque = htmlspecialchars($_POST['marque']);
    $marquereq = "SELECT * FROM brand where name = '$marque'";
    $marquesend = mysqli_query($link, $marquereq);
    $resultmarque = mysqli_fetch_assoc($marquesend);
    $idmarque = intval($resultmarque['id']);
    $cat = htmlspecialchars($_POST['category']);
    $catreq = "SELECT * FROM category where name = '$cat'";
    $catsend = mysqli_query($link, $catreq);
    $resultcat = mysqli_fetch_assoc($catsend);
    $idcat = intval($resultcat['id']);
    $prix = floatval($_POST['prix']);
    $nom = htmlspecialchars($_POST['nom']);
    $genre = $_POST['genre'];
    if(!empty($_POST['prix']) AND !empty($_POST['nom'])){
        if (isset($_FILES["image"]) AND !empty($_FILES["image"]["name"])){
            $taillemax = 2097157;
            $extentionvalide = array('jpg','jpeg','gif','png');
            if($_FILES['image']['size'] <= $taillemax){
                    $extentionupload = strtolower(substr(strrchr($_FILES['image']['name'],'.'), 1));
                    if(in_array($extentionupload, $extentionvalide)){
                        $chemin = "images/".$nom.'.'.$extentionupload;
                        $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$chemin);
                        if($resultat){
                        $name = htmlspecialchars($_FILES['image']['name']);
                        echo ($_FILES['image']['name']);
                        
                           }else{
                            $erreur = "Oups il y à eu un probléme.";
                        
                    }
                   }else{
                    $erreur = "Votre photo doit être en jpg, jpeg , gif ou png.";
                }
               }else{
                $erreur = "Votre photo est trop volumineuse.";
            }
                        };
                         $newprodreq = "INSERT INTO product (name, brand_id,category_id,price,gender,image) VALUES ('$nom','$idmarque','$idcat','$prix','$genre','$nom.$extentionupload')";
                         mysqli_query($link,$newprodreq);
         header("location: gestionproduit.php");
    }else{$erreur= "Tous les champs doivent être remplis.";}
}