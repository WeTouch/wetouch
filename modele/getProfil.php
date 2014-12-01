<?php
class getProfil {
  private $tabInformations;
  public function __construct()
  {
    $this->tabInformations=array();
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
      "prefAge" => $info['prefAge'], "dob" => $info['dob'],"position" => $info['position'], "genre" => $info['genre'], "description" => $info['description'],
      "photo_id" => $info['photo_id']);
    }
    return $this->tabInformations;

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
