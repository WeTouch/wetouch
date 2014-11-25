<?php 
		
		
class FindPicture {
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
		$req->execute(array('id_membres'=>$_SESSION["id"]));
		while($this->tabPath = $req->fetch())
		{
			echo $req->fetch();
		}
		
	}
}
	
?>