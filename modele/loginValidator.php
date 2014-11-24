<?php


class loginValidator {

  static function verifLogin($email,$password)
  {
    require 'class/bdd.php';
    if(!empty($_POST)){
      $tab = array('email'=>$email, 'password'=>$password);
      $sql = 'SELECT email,password FROM t_membres WHERE email = :email AND password = :password';
      $req = $cnx->prepare($sql);
      $req->execute($tab);
      $count = $req->rowCount($sql);
      if($count == 1){
        $_SESSION['connexion'] = 1;
        $_SESSION['name'] = $email;
        return True;
      }
      else{
        $_SESSION['connexion'] = 0;
        return False;
      }

    }
  }
}
?>
