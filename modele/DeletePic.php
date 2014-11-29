<?php 
		
		
class DeletePic {
	public function __construct()
	{
	}
	public function delete()
	{
		require 'class/bdd.php';
		$sql = 'DELETE t_photo  WHERE id_membres=:id';
		$req = $cnx->prepare($sql);
		$req->execute(array('id'=>$_SESSION["id"]));
	}
}
	
?>