<?php
class Match{
	private $idNotMatchYet;
	public function __construct()
	{
      $this->idNotMatchYet=array();
	} 
  public function getMatch()
  {
  	  
      require 'class/bdd.php';
      $req = $cnx->prepare("SELECT id FROM t_membres WHERE id!=:id AND id NOT IN (SELECT vote FROM t_result WHERE voter=:id)");
      $req->execute(array('id'=>$_SESSION['id']));
      while($idNot=$req->fetch())
      	{
      		$this->idNotMatchYet[]=$idNot['id'];
      	}
      
      return $this->idNotMatchYet;
    
  }
  public function displayMatch()
  {
  	foreach ($this->idNotMatchYet as $key) {
  		echo $key."<br>";
  	}
  }
}

?>