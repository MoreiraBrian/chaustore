<?php require_once "admin/connect.php";


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
</head>
<body>
    <main>
        <form method="post">
            <h2>Inscription:</h2>
            <label for="nom">Nom: </label>
            <input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])){echo $_POST['nom'];} ?>">
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" placeholder="Votre prénom" value="<?php if(isset($_POST['prenom'])){echo $_POST['prenom'];} ?>">
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
            <label for="email2">Comfirmez votre email:</label>
            <input type="email" name="email2" placeholder="comfirmation email" value="<?php if(isset($_POST['email2'])){echo $_POST['email2'];} ?>">
        </form>

    </main>
</body>
</html>