<?php


class ModifProfilMoreValidator {

  static function verifProfilMore($taille,$poids,$couleurCheveux,$couleurYeux,$bijoux,$fumeur,$origine,$formation,$situation,$statut,$cherche,$libre)
  {
    require 'class/bdd.php';
    $sql = 'UPDATE t_informations SET taille = :taille, poids=:poids, couleurCheveux = :couleurCheveux, couleurYeux=:couleurYeux, bijoux = :bijoux, fumeur=:fumeur,
    origine = :origine, formation=:formation, situation = :situation, statut=:statut, cherche = :cherche, libre=:libre WHERE id=:id';
    $req = $cnx->prepare($sql);
    $req->execute(array('taille' => $taille, 'poids' => $poids, 'couleurCheveux' => $couleurCheveux, 'couleurYeux' => $couleurYeux, 'bijoux' => $bijoux, 'fumeur' => $fumeur,
    'origine'  => $origine, 'formation' => $formation, 'situation' => $situation, 'statut' => $statut, 'cherche' => $cherche, 'libre' => $libre, 'id'=>$_SESSION['id']));

  }
}
?>
