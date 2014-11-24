<?php


try {
  $cnx =new PDO ('mysql:host=localhost; dbname=wetouch', 'root', '');
}
catch(PDOException $e)
{
  echo $e->getMessage();
}
?>
