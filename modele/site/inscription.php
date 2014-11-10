<?php 
session_start();
include("../connexion_bdd.php");

if(isset($_POST['log-mail']) AND $_POST['log-mail']!="" AND isset($_POST['log-pass']) AND $_POST['log-pass']!="")
  {
   $email = $_POST['log-mail'];

   $options = [
    'cost' => 11,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
];
    $req = $bdd->prepare("INSERT INTO t_membres (genre,dob,motDePasse,firstname,name,email) Values (:titre,:dob,:pass,:prenom,:nom,:mail)"); 

    $reponse = $req->execute(array(
      'titre' => $_POST['rf-titre'],
      'prenom' => utf8_decode($_POST['rf-name']),
      'nom' => utf8_decode($_POST['rf-famillyname']),
      'pass' => utf8_decode(password_hash($_POST['log-pass'], PASSWORD_DEFAULT, $options)),
      'mail' => $_POST['log-mail'],
      'dob' => $_POST['rf-dob'],
     // 'inscription' => $date,
      ));



  



    
   
    $req->closeCursor();


  }
  else 
  {
    header('location:../../index.php?erreur=form');
    exit;
  }

 header('location:../../index.php');


 ?>