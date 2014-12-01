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
    if(isset($this->idNotMatchYet[0]))
    {
      return $this->idNotMatchYet;
    }
    else {
      return false;
    }

  }
  public function displayMatch()
  {
    require 'class/bdd.php';
    $req = $cnx->prepare("SELECT path FROM t_photo WHERE id!=:id");
    $req->execute(array('id'=>$this->idNotMatchYet[0]));
    $fet = $req->fetch() ;
    echo '<img src="images/'.$fet['path'].'"/>';
		echo ' <form method="post" enctype="multipart/form-data">  
                            <button type="submit" name="beau" value="1" class="preview btn btn-success" ><i class="glyphicon glyphicon-heart"></i></button>     
                            <button type="submit" name="beau" value="0" class="preview btn btn-danger" ><i class=" icon-remove"></i></button>  
                        </form>   
		';
  }
  public function vote()
  {
    require 'class/bdd.php';
    $req = $cnx->prepare("INSERT INTO t_result(voter,vote,result) VALUES(:idVoter,:idVote,:result)");
    $req->execute(array('idVoter'=>$_SESSION['id'],'idVote'=>$this->idNotMatchYet[0],'result'=>$_POST['beau']));
  }
}

?>


