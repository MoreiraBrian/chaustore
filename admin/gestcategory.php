<?php  session_start();  
if(isset($_SESSION['pseudo'])){
require_once "connect.php";
require_once "category.php";
if(isset($_POST['newadd'])){
    if(!empty($_POST['newcat'])){
    header("location: gestcategory.php");
}else{
    $erreur ="Vous devez marquer un nom.";
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
        <h1>Gestion des catégories</h1>
        <form method="post" action="">
            <label for="newcat">Ajouter une marque:</label>
        <input type="text" name="newcat" placeholder="Catégorie à ajouter">
        <input type="submit" name="newadd" value="Confirmer">
        <?php if(isset($erreur)){echo $erreur;} ?>
        </form>
        <h2>Vos catégories enregistés:</h2>
        <?php
        while ($catname = mysqli_fetch_assoc($postcat)){
            ?><div class='marque'><p><?php echo $catname['name']; ?></p>
            <form method='post' action="">
            <input type='text' name='change<?php echo $catname['id']?>' placeholder='Veuillez écrire la modification'>
            <input type='submit' name='changecat<?php echo $catname['id']?>' value='Modifier'>
            <input type='submit' name='delcat<?php echo $catname['id']?>' value='Supprimer' onclick="confirmation()">
            
            </form>
            </div>
            <?php 
   if(isset($_POST['changecat'.$catname['id']])){
    if(!empty($_POST['change'.$catname['id']])){
    $change = htmlspecialchars($_POST['change'.$catname['id']]);
    $id = intval($catname['id']);
    $changecat = "UPDATE category SET `name` = '$change' where id = '$id'";
    mysqli_query($link, $changecat);
    header("location: gestcategory.php");
    
    }else{ $erreur = " <p id='erreur'>Vous devez marquer un nom</p>";
        if(isset($erreur)){echo $erreur;} }
    } 
    if(isset($_POST['delcat'.$catname['id']])){
    header("location: deletecategory.php?id=".$catname['id']);
    }?>
       <?php }
       }else{
        header("location: index.php");
    }
?> 
        
        
    </main>  
</body>
</html>
