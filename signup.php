<?php require_once "admin/connect.php";


if(isset($_POST['inscription'])){
    $error ="";
    if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['adresse']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND ($_POST['email'] == $_POST['email2']) AND($_POST['mdp']==$_POST['mdp2']) AND filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
        $lastname = htmlspecialchars($_POST['nom']);
        $name = htmlspecialchars($_POST['prenom']);
        $address = htmlspecialchars($_POST['adresse']);
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['mdp']);
        $message = "Bonjour $name. Nous vous confirmons votre inscription sur Chaustore. Vous pouvez des à présent faire vos achats. Vous pouvez aussi changer vos information à tout moment sur votre espace personnel.";
        $formreq = "INSERT INTO user (first_name, last_name, address, email, password) VALUES 
        ('$name','$lastname','$address','$email','$password')";
        mysqli_query($link,$formreq);
        mail($email,"Inscription à Chaustore",$message,"From: Brian");
    }else{
        $error = "Tous les champs doivent être complétés.</br>";
    };
    if(empty($_POST['prenom'])){
        $error .= "Vous devez donner un prénom.</br>" ;
    };
    if(empty($_POST['nom'])){
        $error .= "Vous devez donner un nom.</br>" ;
    };
    if(empty($_POST['adresse'])){
        $error .= "Vous devez donner une adresse.</br>" ;
    };
    if(empty($_POST['email'])){
        $error .= "Vous devez donner un mail.</br>" ;
    };
    if(empty($_POST['email2'])){
        $error .= "Vous devez confirmer le mail.</br>" ;
    };
    if(empty($_POST['mdp'])){
        $error .= "Vous devez donner un mot de passe.</br>" ;
    };
    if(empty($_POST['mdp2'])){
        $error .= "Vous devez confirmer le mot de passe.</br>" ;
    };
    if($_POST['email'] != $_POST['email2']){
        $error .= "Les email doivent être identiques.</br>";
    };
    if($_POST['mdp'] != $_POST['mdp2']){
        $error .= "Les email doivent être identiques.</br>";
    };
    if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $error .= "Votre email n'est pas valide.</br>";   
    }
}