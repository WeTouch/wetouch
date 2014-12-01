<?php


try {
  $cnx =new PDO ('mysql:host=localhost; dbname=wetouch', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(PDOException $e)
{
  echo $e->getMessage();
}
?>
