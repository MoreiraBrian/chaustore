<?php session_start();
require_once 'admin/connect.php';
$id = $_SESSION['id'];
$recupinforeq = "SELECT * FROM user where id = '$id'";
$recupinfosend = mysqli_query($link,$recupinforeq);
$info = mysqli_fetch_array($recupinfosend);
if(isset($_POST['modif'])){
    if($_POST['nom'] != $info['last_name']){
        $newname = htmlspecialchars($_POST['nom']);
        $namereq = "UPDATE user SET last_name = '$newname' WHERE id = '$id'";
        mysqli_query($link,$namereq);
    };
    if($_POST['prenom'] != $info['first_name']){
        $newname = htmlspecialchars($_POST['prenom']);
        $namereq = "UPDATE user SET first_name = '$newname' WHERE id = '$id'";
        mysqli_query($link,$namereq);
    };
    if($_POST['adresse'] != $info['address']){
        $newname = htmlspecialchars($_POST['adresse']);
        $namereq = "UPDATE user SET address = '$newname' WHERE id = '$id'";
        mysqli_query($link,$namereq);
    };
    if($_POST['email'] != $info['email']){
        $newname = htmlspecialchars($_POST['email']);
        $namereq = "UPDATE user SET email = '$newname' WHERE id = '$id'";
        mysqli_query($link,$namereq);
    };
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form class="formulaire" method="post">
        <h2>Mes informations:</h2>
            <label for="nom">Nom: </label>
            <input type="text" name="nom" placeholder="Votre nom" value="<?php echo $info['last_name']; ?>">
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" placeholder="Votre prénom" value="<?php echo $info['first_name']; ?>">
            <label for="adresse">Adresse compléte:</label>
            <input type="text" name="adresse" placeholder="Votre adresse" value="<?php echo $info['address']; ?>">
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="email" value="<?php echo $info['email']; ?>">
            <input type="submit" name="mdp" value="Modifier mon mot de passe">
            <input type="submit" name="modif" value="Modifier">
    </form>
</body>
</html>