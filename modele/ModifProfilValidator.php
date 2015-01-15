<?php


class ModifProfilValidator {

  static function verifProfil($description,$genre)
  {
    require 'class/bdd.php';
    $sql = 'UPDATE t_membres SET description = :description, preference=:preference WHERE id=:id';
    $req = $cnx->prepare($sql);
    $req->execute(array('id'=>$_SESSION["id"],'description'=>htmlentities($description),'preference'=>$genre));

  }
}
?>
