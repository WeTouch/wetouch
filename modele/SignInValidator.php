<?php


class SignInValidator {

  static function verifSignIn($nom,$prenom,$email,$ddn,$genre,$password,$verifPassword)
  {
    require 'class/bdd.php';
    if(!empty($_POST)){
      $preference = null;
      if ($genre == "homme")
      {
        $preference = "femme";
      }
      else if ($genre == "femme")
      {
        $preference = "homme";
      }
      $q = array('nom'=>$nom, 'prenom'=>$prenom, 'email'=>$email, 'ddn'=>$ddn, 'genre'=>$genre, 'preference'=>$preference, 'password'=>$password);
      $req = $cnx->prepare("INSERT INTO t_membres (email, firstname, name, dob, preference, genre, password) VALUES (:email,:prenom, :nom, :ddn, :preference, :genre, :password)");
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
