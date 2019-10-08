<?php  session_start();  
if(isset($_SESSION['pseudo'])){
require_once "connect.php";
require_once "couleur.php";
if(isset($_POST['newadd'])){
    if(!empty($_POST['newcolor'])){
    header("location: gestcouleur.php");
}
else{
    $erreur1 ="Vous devez marquer un nom.";
}
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
        <h1>Gestion des couleurs</h1>
        <form method="post" action="">
            <label for="newcolor">Ajouter une couleur:</label>
        <input type="text" name="newcolor" placeholder="Couleur à ajouter">
        <input type="submit" name="newadd" value="Confirmer">
        <?php if(isset($erreur1)){echo $erreur1;} ?>
        </form>
        <h2>Vos couleurs enregistés:</h2>
        <?php
        while ($colorname = mysqli_fetch_assoc($postcolor)){
            ?>
            <div class='marque'><p><?php echo $colorname['name']; ?></p>
            <form method='post' action="">
            <input type='text' name='change<?php echo $colorname['id']?>' placeholder='Veuillez écrire la modification'>
            <input type='submit' name='changecolor<?php echo $colorname['id']?>' value='Modifier'>
            <input type='submit' name='delcolor<?php echo $colorname['id']?>' value='Supprimer' onclick="confirmation()">
            
            </form>
            </div>
            <?php 
   if(isset($_POST['changecolor'.$colorname['id']])){
    if(!empty($_POST['change'.$colorname['id']])){
    $change = htmlspecialchars($_POST['change'.$colorname['id']]);
    $id = intval($colorname['id']);
    $changecolor = "UPDATE color SET `name` = '$change' where id = '$id'";
    mysqli_query($link, $changecolor);
    header("location: gestcouleur.php");
    
    }else{ $erreur = " <p id='erreur'>Vous devez marquer un nom</p>";
        if(isset($erreur)){echo $erreur;} }
    } 
    if(isset($_POST['delcolor'.$colorname['id']])){
header("location: deletecolor.php?id=".$colorname['id']);
    }?>
       <?php }
       }else{
        header("location: index.php");
    }
?> 
        
        
    </main>  
</body>
</html>