<?php
class Chat{
  public function __construct()
  {
    $this->MatchYet=array();
    $this->Message=array();
  }
  public function getTalker()
  {

    require 'class/bdd.php';
    $req = $cnx->prepare("SELECT vote FROM t_result WHERE voter =:id AND result = 1 AND vote IN ( SELECT voter FROM t_result WHERE vote=:id AND result =1)");
    $req->execute(array('id'=>$_SESSION['id']));
    while($idMatch=$req->fetch())
    {
      $this->MatchYet[]=$idMatch['vote'];
    }

    return $this->MatchYet;

  }

  public function getMessage()
  {

    foreach ($this->MatchYet as $key) {
      $req = $cnx->prepare("SELECT message FROM t_chat WHERE (SendId =:id AND ReceiveId = :key) OR (SendId=:key AND ReceiveId = :id)");
      $req->execute(array('id'=>$_SESSION['id'],'key'=>$key));
      while ($message=$req->fetch())
      {
        $this->Message[]=$message['message'];
      }


    }

  }
  public function displayMatchForChat()
  {
    require 'class/bdd.php';
    foreach ($this->MatchYet as $key) {
      unset($this->Message);
      echo $key . "<br/>";
      $req = $cnx->prepare("SELECT message FROM t_chat WHERE (SendId =:id AND ReceiveId = :key) OR (SendId=:key AND ReceiveId = :id)");
      $req->execute(array('id'=>$_SESSION['id'],'key'=>$key));
      while ($message=$req->fetch())
      {
        $this->Message[]=$message['message'];

      }


      foreach($this->Message as $msg)
      {
        echo "- ". $msg . "<br/>";
      }
      echo "<br/><br/>";

    }
  }
}

?>
