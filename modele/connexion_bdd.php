<?php
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=wetouch', 'root', 'root');
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }
?>