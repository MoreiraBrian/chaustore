<?php session_start();  
if(isset($_SESSION['pseudo'])){
require_once "connect.php";
require_once "marque.php";
if(isset($_POST['newadd'])){
    if(!empty($_POST['newmarque'])){
    header("location: gestmarque.php");
}
else{
    $erreur ="Vous devez marquer un nom.";
}}
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
        <h1>Gestion des marques</h1>
        <form method="post" action="">
            <label for="newmarque">Ajouter une marque:</label>
        <input type="text" name="newmarque" placeholder="Marque à ajouter">
        <input type="submit" name="newadd" value="Confirmer">
        <?php if(isset($erreur)){echo $erreur;} ?>
        </form>
        <h2>Vos marques enregistés:</h2>
        <?php
        while ($brandname = mysqli_fetch_assoc($postbrand)){
            ?><div class='marque'><p><?php echo $brandname['name']; ?></p>
            <form method='post' action="">
            <input type='text' name='change<?php echo $brandname['id']?>' placeholder='Veuillez écrire la modification'>
            <input type='submit' name='changemarque<?php echo $brandname['id']?>' value='Modifier'>
            <input type='submit' name='delmarque<?php echo $brandname['id']?>' value='Supprimer' onclick="confirmation()">
            
            </form>
            </div>
            <?php 
   if(isset($_POST['changemarque'.$brandname['id']])){
    if(!empty($_POST['change'.$brandname['id']])){
    $change = htmlspecialchars($_POST['change'.$brandname['id']]);
    $id = intval($brandname['id']);
    $changebrand = "UPDATE brand SET `name` = '$change' where id = '$id'";
    mysqli_query($link, $changebrand);
    header("location: gestmarque.php");
    
    }else{ $erreur = " <p id='erreur'>Vous devez marquer un nom</p>";
        if(isset($erreur)){echo $erreur;} }
    } 
    if(isset($_POST['delmarque'.$brandname['id']])){
    header("location: deletemarque.php?id=".$brandname['id']);
    }?>
       <?php }
}else{
    header("location: index.php");
}
?> 
        
        
    </main>  
</body>
</html>