<?php


class getProfil {
  private $tabInformations;
  private $tabMoreInformations;
  public function __construct()
  {
    $this->tabInformations=array();
    $this->tabMoreInformations=array();
  }
  public function getInformations()
  {
    require 'class/bdd.php';
    $sql = 'SELECT * FROM t_membres WHERE id=:id';
    $req = $cnx->prepare($sql);
    $req->execute(array('id'=>$_SESSION["id"]));
    while($info= $req->fetch())
    {
      $this->tabInformations[] = array("email" => $info['email'], "firstname" => $info['firstname'], "name" => $info['name'],"preference" =>$info['preference'],
      "dob" => $info['dob'],"position" => $info['position'], "genre" => $info['genre'], "description" => $info['description'],
      "photo_id" => $info['photo_id']);
    }
    return $this->tabInformations;

  }

  public function getMoreInformations()
  {
    require 'class/bdd.php';
    $sql = 'SELECT * FROM t_informations WHERE id=:id';
    $req = $cnx->prepare($sql);
    $req->execute(array('id'=>$_SESSION["id"]));
    while($info= $req->fetch())
    {
      $this->tabMoreInformations[] = array("taille" => $info['taille'], "poids" => $info['poids'], "couleurCheveux" => $info['couleurCheveux'],"couleurYeux" =>$info['couleurYeux'],
      "bijoux" => $info['bijoux'],"fumeur" => $info['fumeur'], "origine" => $info['origine'], "formation" => $info['formation'],
      "situation" => $info['situation'],  "statut" => $info['statut'],  "cherche" => $info['cherche'],  "libre" => $info['libre']);
    }
    return $this->tabMoreInformations;
  }

  /*  public function getPictureProfil()
  {
  require 'class/bdd.php';
  $sql = 'SELECT photo_id FROM t_membres WHERE id=:id';
  $req = $cnx->prepare($sql);
  $req->execute(array('id'=>$_SESSION["id"]));
  $photo = $req->fetch();

} */
}


?>
