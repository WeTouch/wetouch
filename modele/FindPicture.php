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
		$req->execute(array('id'=>$_SESSION["id"]));
		while($moi= $req->fetch())
		{
			$this->tabPath[] = $moi['path'];
		}
		return $this->tabPath;
	}
	public function displayPicture()
	{
		foreach ($this->tabPath as $key) {
			echo '<img src="images/'.$_SESSION['id'].$key.'" style="width:150px;"><br/>';
		}
	}
}
	
?>