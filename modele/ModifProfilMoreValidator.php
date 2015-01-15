<?php


class ModifProfilMoreValidator {

  static function verifProfilMore($taille,$poids,$couleurCheveux,$couleurYeux,$bijoux,$fumeur,$origine,$formation,$situation,$statut,$cherche,$libre)
  {
    require 'class/bdd.php';
    $sql = 'UPDATE t_informations SET taille = :taille, poids=:poids, couleurCheveux = :couleurCheveux, couleurYeux=:couleurYeux, bijoux = :bijoux, fumeur=:fumeur,
    origine = :origine, formation=:formation, situation = :situation, statut=:statut, cherche = :cherche, libre=:libre WHERE id=:id';
    $req = $cnx->prepare($sql);
    $req->execute(array('taille' => $taille, 'poids' => $poids, 'couleurCheveux' => htmlentities($couleurCheveux), 'couleurYeux' => htmlentities($couleurYeux), 'bijoux' => htmlentities($bijoux), 'fumeur' => htmlentities($fumeur),
    'origine'  => htmlentities($origine), 'formation' => htmlentities($formation), 'situation' => htmlentities($situation), 'statut' => htmlentities($statut), 'cherche' => htmlentities($cherche), 'libre' => htmlentities($libre), 'id'=>$_SESSION['id']));

  }
}
?>
