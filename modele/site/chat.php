<?php
session_start();
include("../connexion_bdd.php");
$id = $_SESSION['id'];




if( isset($_POST['chat']) && isset($_POST['id']) ) // si formulaire soumis
{
	$chat = $_POST['chat'];
	$idPost = $_POST['id'];

      $req=$bdd->query("SELECT msg FROM t_chat where (id_user1='$id' AND id_user2='$idPost') OR (id_user1='$idPost' AND id_user2='$id')");
	      while( $donnees= $req->fetch())

     {
       $msg = $donnees['msg'];
	   
      } 
	  
	  if (isset($msg))
	  {
	      $req = $bdd->prepare("UPDATE t_chat SET msg=:msg where (id_user1='$id' AND id_user2='$idPost') OR (id_user1='$idPost' AND id_user2='$id')"); 



    $reponse = $req->execute(array(

      'msg' => $msg . "<br/><br/>" . $id . ":" . $_POST['chat'],



      ));
	  }
	
	  
	  else
	  {
	   
    $req = $bdd->prepare("INSERT INTO t_chat (id_user1,id_user2,msg) Values (:id1,:id2,:msg)"); 



    $reponse = $req->execute(array(

      'id1' => $id,

      'id2' => $idPost,

      'msg' => $id . ':' . $_POST['chat']


      ));
	  }
	

	
         header('location:../../index.php');


}
else
{
echo "Manque de paramètre";
}
?>