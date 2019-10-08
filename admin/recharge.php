<?php  
require_once "connect.php";
if(isset($_POST['OK'])){
    header("location: gestionproduit.php");
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
        <h2>Vos modifications ont bien étaient prisent en compte.</h2>
        <form method="post">
            <input type="submit" name="OK" value="Continuer">
        </form>
        
        
    </main>  
</body>
</html>