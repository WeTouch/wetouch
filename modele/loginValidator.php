<?php


class loginValidator {

  static function verifLogin($email,$password)
  {
    require 'class/bdd.php';
    if(!empty($_POST)){
      $tab = array('email'=>$email, 'password'=>md5($password));
      $sql = 'SELECT email,password,id,firstname,name,photo_id FROM t_membres WHERE email = :email AND password = :password';
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
        $_SESSION['path'] = $idrep['photo_id'];
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
