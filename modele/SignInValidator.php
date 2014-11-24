<?php


class SignInValidator {

  static function verifSignIn($nom,$prenom,$email,$ddn,$genre,$password,$verifPassword)
  {
    require 'class/bdd.php';
    if(!empty($_POST)){
      $q = array('nom'=>$nom, 'prenom'=>$prenom, 'email'=>$email, 'ddn'=>$ddn, 'genre'=>$genre, 'password'=>$password);
      $req = $cnx->prepare("INSERT INTO t_membres (email, firstname, name, dob, genre, password) VALUES (:email,:prenom, :nom, :ddn, :genre, :password)");
      $req->execute($q);
      return True;
    }
    else
    {
      echo "Champs incomplet";
      return False;
    }
  }

}

?>
