<?php  session_start();  
if(isset($_SESSION['pseudo'])){
require_once "connect.php";
require_once "taille.php";
if(isset($_POST['newadd'])){
    if(!empty($_POST['newsize'])){
    header("location: gesttaille.php");
}else{
    $erreur1 ="Vous devez marquer une taille";
    
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
        <h1>Gestion des tailles</h1>
        <form method="post" action="">
            <label for="newsize">Ajouter une taille:</label>
        <input type="text" name="newsize" placeholder="taille à ajouter">
        <input type="submit" name="newadd" value="Confirmer">
        <?php if(isset($erreur1)){echo $erreur1;} ?>
        </form>
        <h2>Vos tailles enregistés:</h2>
        <?php
        while ($sizename = mysqli_fetch_assoc($postsize)){
            ?><div class='marque'><p><?php echo $sizename['name']; ?></p>
            <form method='post' action="">
            <input type='text' name='change<?php echo $sizename['id']?>' placeholder='Veuillez écrire la modification'>
            <input type='submit' name='changesize<?php echo $sizename['id']?>' value='Modifier'>
            <input type='submit' name='delsize<?php echo $sizename['id']?>' value='Supprimer' onclick="confirmation()">
            
            </form>
            </div>
            <?php 
   if(isset($_POST['changesize'.$sizename['id']])){
    if(!empty($_POST['change'.$sizename['id']])){
    $change = htmlspecialchars($_POST['change'.$sizename['id']]);
    $id = intval($sizename['id']);
    $changesize = "UPDATE size SET `name` = '$change' where id = '$id'";
    mysqli_query($link, $changesize);
    header("location: gesttaille.php");
    
    }else{ $erreur = " <p id='erreur'>Vous devez marquer un nom</p>";
        if(isset($erreur)){echo $erreur;} }
    } 
    if(isset($_POST['delsize'.$sizename['id']])){
    header("location: deletesize.php?id=".$sizename['id']);
    }?>
       <?php }
       }else{
        header("location: index.php");
    }
?> 
        
        
    </main>  
</body>
</html>
