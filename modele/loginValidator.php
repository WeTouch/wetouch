<?php


class loginValidator {

  static function verifLogin($email,$password)
  {
    require 'class/bdd.php';
    if(!empty($_POST)){
      $tab = array('email'=>$email, 'password'=>$password);
      $sql = 'SELECT email,password,id,firstname,name FROM t_membres WHERE email = :email AND password = :password';
      $req = $cnx->prepare($sql);
      $req->execute($tab);

      $idrep = $req->fetch();
      $count = $req->rowCount($sql);
      if($count == 1){
        $_SESSION['connexion'] = 1;
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $idrep['id'];
        $_SESSION['name'] = $idrep['name'];
        $_SESSION['firstname'] = $idrep['firstname'];
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
