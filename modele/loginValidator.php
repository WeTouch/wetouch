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
    $_SESSION['name'] = $email;
    header('Location:/wetouch');die;
  }
  else{
    //Si utilisateur inconnu
    header('Location:/wetouch/login');die;
  }

}
?>
