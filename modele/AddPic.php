<?php 
    
    
class AddPic {
  public function __construct()
  {
  }
  public function add()
  {
    require 'class/bdd.php';
$id = $_SESSION['id'];
$req=$cnx->query("SELECT id FROM t_photo where id_membres='$id'");
$row_count = $req->rowCount();



if( isset($_POST['upload']) ) // si formulaire soumis
{
  $dossier = "images/" . $id;
if(!is_dir($dossier)){
   mkdir($dossier);
}
    $content_dir = 'images/' . $id . "/";// dossier où sera déplacé le fichier

    $tmp_file = $_FILES['fichier']['tmp_name']; 

    if( !is_uploaded_file($tmp_file) )
    {
        echo $_POST['upload'];
        exit("Le fichier est introuvable");
    }

    // on vérifie maintenant l'extension
    $type_file = $_FILES['fichier']['type'];

    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') && !strstr($type_file, 'png') )
    {
        exit("Le fichier n'est pas une image");
    }

    // on copie le fichier dans le dossier de destination
    $name_file = $row_count+1 .'.jpg';

    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit("Impossible de copier le fichier dans $content_dir");
    }
$zboub = $id . "/" . $name_file;

    if ($row_count == 0)
    {
     $req = $cnx->prepare("UPDATE t_membres set photo_id = '$zboub' WHERE id='$id'"); 



    $reponse = $req->execute(array(

      'path' => $id . "/" . $name_file

    ));
    }
   $req = $cnx->prepare("INSERT INTO t_photo(path,id_membres) Values (:path,:id_membres)"); 



    $reponse = $req->execute(array(

      'path' => $id . "/" . $name_file,

      'id_membres' => $id

    

      ));

  
         header('location:../../index.php');


}
  }
}
  
?>









<?php

?>