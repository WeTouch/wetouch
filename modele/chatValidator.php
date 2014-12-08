<?php


class chatValidator {

  static function sendMsg($idChat,$msg)
  {
    require 'class/bdd.php';
    $date = date("Y-m-d H:i:s");
    $q = array('SendId'=>$_SESSION['id'], 'ReceiveId'=>$idChat, 'message'=>$msg);
    $req = $cnx->prepare("INSERT INTO t_chat (SendId, ReceiveId, message) VALUES (:SendId,:ReceiveId,:message)");
    $req->execute($q);
    $q = array('SendId'=>$_SESSION['id'], 'ReceiveId'=>$idChat, 'message'=>"No msg yet");
    $req = $cnx->prepare("DELETE FROM t_chat WHERE ((SendId=:SendId OR SendId=:ReceiveId) AND (ReceiveId=:SendId OR ReceiveId=:ReceiveId) AND message=:message)");
    $req->execute($q);
  }

}

?>
