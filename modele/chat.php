<?php
class Chat{
  public function __construct()
  {
    $this->MatchYet=array();
    $this->NameMatch = array();
    $this->Message=array();

  }
  public function getTalker()
  {

    require 'class/bdd.php';
    $req = $cnx->prepare("SELECT r.vote, m.firstname,m.photo_id FROM t_result r, t_membres m  WHERE (r.voter =:id AND r.result = 1 AND r.vote IN ( SELECT r.voter FROM t_result r WHERE r.vote=:id AND r.result =1)) AND r.vote = m.id");
    $req->execute(array('id'=>$_SESSION['id']));
    while($idMatch=$req->fetch())
    {
      $this->MatchYet[]=$idMatch['vote'];
      $this->NameMatch[]=$idMatch['firstname'];
    }

    return array($this->MatchYet , $this->NameMatch);

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
    $i = 0;
    $j = 0;
    $TabFinal="";
    foreach ($this->MatchYet as $key) {




      $req = $cnx->prepare("SELECT c.message,m.firstname,m.id FROM t_chat c , t_membres m WHERE ((c.SendId =:id AND c.ReceiveId = :key) OR (c.SendId=:key AND c.ReceiveId = :id)) AND c.SendId = m.id   ");
      $req->execute(array('id'=>$_SESSION['id'],'key'=>$key));
      while ($message=$req->fetch())
      {



        $TabFinal[$this->NameMatch[$i] . "*" . $key][] = [($message['firstname']) => ($message['message'])];

        $j++;
      }

      $i++;
      /*    var_dump($this->MatchYet);die;
      echo "<h4>Discussion avec " . $this->NameMatch[$i] . "</h4>";
      unset($this->Message);
      $req = $cnx->prepare("SELECT c.message,m.firstname FROM t_chat c , t_membres m WHERE ((c.SendId =:id AND c.ReceiveId = :key) OR (c.SendId=:key AND c.ReceiveId = :id)) AND c.SendId = m.id  ");
      $req->execute(array('id'=>$_SESSION['id'],'key'=>$key));
      while ($message=$req->fetch())
      {
      $this->Message[] =[($message['firstname']) => ($message['message'])];
    }


    if (empty($this->Message)!=1)
    {
    foreach($this->Message as $valeur => $msg)
    {
    foreach($msg as $nom => $msgEnv)
    {
    echo $nom . " : " . $msgEnv . "<br/>";
  }
}

echo '
<form method="post" action="#">
<input type="text" name="id" value=' . $key . ' style="width:20px; display:none;">
<input type="text" name="message"/>
<input type="submit" value="Envoyer"/>
</form>';

}
else
{
echo 'Envoyer le premier message! <form method="post" action="#">
<input type="text" name="id" value=' . $key . ' style="width:20px; display:none;">
<input type="text" name="message"/>
<input type="submit" value="Envoyer"/>
</form>';
}
$i++; */

}

return $TabFinal;

}




}

?>
