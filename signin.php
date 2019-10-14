<?php 
if(isset($_POST['connect'])){
if(!empty($_POST['email']) AND !empty($_POST['mdp']) AND filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    $email=htmlspecialchars($_POST['email']);
    $mdp = sha1($_POST['mdp']);
    $verifreq = "SELECT count(id) FROM user WHERE email = '$email' AND password = '$mdp'";
    $verifsend = mysqli_query($link,$verifreq);
    $verif = mysqli_fetch_array($verifsend);
    if($verif[0] == 1){
        $conectreq = "SELECT * FROM user WHERE email = '$email' AND password = '$mdp'";
        $conectsend = mysqli_query($link,$conectreq);
        $conect = mysqli_fetch_array($conectsend);
        $_SESSION['id'] = $conect[0];
        $_SESSION['name'] = $conect[1];
        header("location: index.php");
    }
}
}