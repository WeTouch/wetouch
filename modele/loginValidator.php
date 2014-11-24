<?php
require 'class/bdd.php';


if(!empty($_POST)){
  $email = $_POST['email'];
  $password = ($_POST['password']);
  $tab = array('email'=>$email, 'password'=>$password);
  $sql = 'SELECT email,password FROM t_membres WHERE email = :email AND password = :password';
  $req = $cnx->prepare($sql);
  $req->execute($tab);
  $count = $req->rowCount($sql);
  if($count == 1){
    $_SESSION['connexion'] = 1;
    header('Location:perso.php');
  }
  else{
    //Si utilisateur inconnu
    $error_unknown = 'Utilisateur inexistant !';
  }

}
?>
