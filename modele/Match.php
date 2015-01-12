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
    $req = $cnx->prepare("SELECT id,genre
                        FROM t_membres m
                        WHERE id!=:id
                        AND id NOT IN (SELECT vote FROM t_result WHERE voter=:id)
                        AND id NOT IN (SELECT id FROM t_membres WHERE m.genre!= (SELECT preference FROM t_membres WHERE id=:id))");
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



			public function listMatch()
			{
				require 'class/bdd.php';
				$req = $cnx->prepare("SELECT id,genre
				FROM t_membres m
				WHERE id!=:id
				AND id  IN (SELECT vote FROM t_result WHERE voter=:id)
				AND id  IN (SELECT voter FROM t_result WHERE vote =:id)");
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
    $req = $cnx->prepare("SELECT * FROM t_membres WHERE id=:id");
    $req->execute(array('id'=>$this->idNotMatchYet[0]));
    $fet = $req->fetch() ;
		return $fet;

  }

	public function displayInfo()
	{
		require 'class/bdd.php';
		$req = $cnx->prepare("SELECT * FROM t_informations WHERE id=:id");
		$req->execute(array('id'=>$this->idNotMatchYet[0]));
		$fetinfo = $req->fetch();
		return $fetinfo;
	}
  public function vote()
  {
    require 'class/bdd.php';

    $req2 = $cnx->prepare("SELECT * FROM t_result WHERE voter=:idVote AND vote=:id AND result=1");
    $req2->execute(array('id'=>$_SESSION['id'],'idVote'=>$this->idNotMatchYet[0]));
    $matchyet = $req2->fetch();
    if($matchyet && $_POST['beau'])
    {
      $req3 = $cnx->prepare("INSERT INTO t_chat (SendId,ReceiveId,message) VALUES(:id,:idVote,'No msg yet')");
      $req3->execute(array('id'=>$_SESSION['id'],'idVote'=>$this->idNotMatchYet[0]));
    }


    $req = $cnx->prepare("INSERT INTO t_result(voter,vote,result) VALUES(:idVoter,:idVote,:result)");
    $req->execute(array('idVoter'=>$_SESSION['id'],'idVote'=>$this->idNotMatchYet[0],'result'=>$_POST['beau']));
  }

}

?>
