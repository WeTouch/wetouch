<?php 
    
    
class Picture {
  private $tabPath;
  public function __construct()
  {
    $this->tabPath=array();
  }
  public function getPicture()
  {
    require 'class/bdd.php';
    $sql = 'SELECT path FROM t_photo WHERE id_membres=:id';
    $req = $cnx->prepare($sql);
    $req->execute(array('id'=>$_SESSION["id"]));
    while($moi= $req->fetch())
    {
      $this->tabPath[] = $moi['path'];
    }
    return $this->tabPath;
  }
  public function getPictureId($id)
  {
    require 'class/bdd.php';
    $array  = array();
    $sql = 'SELECT DISTINCT p.path,m.photo_id FROM t_photo p JOIN t_membres m ON m.id=p.id_membres WHERE id_membres=:id';
    $req = $cnx->prepare($sql);
    $req->execute(array('id'=>$id));
    $moi= $req->fetch();
    $array[]= $moi['photo_id'];
    while($moi= $req->fetch())
    {
      $array[]= $moi['path'];
    }
    return $array;
  }
  public function delete()
  {
    require 'class/bdd.php';
    $sql = 'DELETE FROM t_photo  WHERE id_membres=:id AND path=:path';
    $req = $cnx->prepare($sql);
    $req->execute(array('id'=>$_SESSION["id"],'path'=>$_POST['del']));
    unlink('images/'.$_POST['del']);
    if($_POST['del']==$_SESSION['path'])
    {
      $sql = 'SELECT id FROM t_photo where id_membres=:id';
      $req = $cnx->prepare($sql);
      $req->execute(array('id'=>$_SESSION["id"]));
      $row_count = $req->rowCount();
      if($row_count==0)
      {
        $sql = 'UPDATE t_membres SET photo_id="homme.jpg" WHERE id=:id';
        $req = $cnx->prepare($sql);
        $req->execute(array('id'=>$_SESSION["id"]));
        $_SESSION['path']="homme.jpg";
      }
      else
      {
        $sql1 = 'SELECT Min(path) FROM t_photo WHERE id_membres=:id ORDER BY id';
        $req1 = $cnx->prepare($sql1);
        $req1->execute(array('id'=>$_SESSION["id"]));
        $min= $req1->fetch();
        $sql = 'UPDATE t_membres SET photo_id=:min WHERE id=:id';
        $req = $cnx->prepare($sql);
        $req->execute(array('id'=>$_SESSION["id"],'min'=>$min[0]));
        $_SESSION['path']=$min[0];
      }
    }
  }
  public function favorit()
  {
    require 'class/bdd.php';
    $sql = 'UPDATE t_membres SET photo_id=:path WHERE id=:id';
    $req = $cnx->prepare($sql);
    $req->execute(array('id'=>$_SESSION["id"],'path'=>$_POST['fav']));
    $_SESSION['path']=$_POST['fav'];
  }
  public function add()
  {
    require 'class/bdd.php';
    $sql = 'SELECT id FROM t_photo where id_membres=:id';
    $req = $cnx->prepare($sql);
    $req->execute(array('id'=>$_SESSION["id"]));
    $row_count = $req->rowCount();
    if( isset($_POST['upload']) ) // si formulaire soumis
    {
      $dossier = "images/" . $_SESSION['id'];
      if(!is_dir($dossier))
      {
         mkdir($dossier);
      }
      $content_dir = 'images/' . $_SESSION['id'] . "/";

      // dossier où sera déplacé le fichier 
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
      $sql2 = 'SELECT MAX(id) id FROM t_photo';
      $req2 = $cnx->prepare($sql2);
      $req2->execute();
      $max = $req2->fetch();
      // on copie le fichier dans le dossier de destination
      $name_file = $max['id']+1 .'.jpg';
      if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
      {
          exit("Impossible de copier le fichier dans $content_dir");
      }
      if ($row_count == 0)
      {
        $sql = 'UPDATE t_membres set photo_id = :photoId WHERE id=:id';
        $req = $cnx->prepare($sql);
        $req->execute(array('photoId'=>$_SESSION['id'] . "/" . $name_file,'id'=>$_SESSION['id']));
        $_SESSION['path']=$_SESSION['id'] . "/" . $name_file;
      }
      $req = $cnx->prepare("INSERT INTO t_photo(path,id_membres) Values (:path,:id_membres)"); 
      $reponse = $req->execute(array(
        'path' => $_SESSION['id'] . "/" . $name_file,
        'id_membres' => $_SESSION['id']
        ));
    }
  }
}
  
?>

