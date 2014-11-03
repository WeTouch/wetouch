<?php
session_start();
include("connexion_bdd.php");
 
  if(isset($_SESSION['log-mail']) && $_SESSION['log-pass'])
{


    echo "deja co";
  

  
  }
  
  elseif (isset($_POST['log-mail']) AND $_POST['log-mail']!="" AND isset($_POST['log-pass']) AND $_POST['log-pass']!="")  

  {
   $mail= $_POST['log-mail'];


      $req=$bdd->query("SELECT pass FROM clients WHERE mail='$mail'");
    while( $donnees= $req->fetch())
     {
       $passhash=$donnees['pass'];
      }

      if (isset($passhash) && $passhash!="") 
      {
        
      }
      else
      {
        echo "Compte inexistant";
        exit;
      }

      if (password_verify( $_POST['log-pass'] , $passhash))
      {
        //echo "bon mdp";

         $_SESSION['log-mail']=$_POST['log-mail'];
         $_SESSION['log-pass']=$passhash;
         
         header('location:../index.php');
      }
      else
      {
        echo "Mot de passe erroné";
      }


    





/*

     $req = $bdd->prepare('SELECT * FROM clients WHERE mail=:mail AND pass=:pass'); 
    $reponse = $req->execute(
      array('mail' => $_POST['log-mail'],
            'pass' => $_POST['log-pass']
            ));
           $donnees = $req->fetch();  

     if($donnees)

     { 
      
      
      foreach ($donnees as $key => $value) 
      {
        $_SESSION[$key]=$value;
        

      }
      
      header('location:../../index.php');
    }

    else
    {
      echo "Mauvais MDP ou pseudo";
    }
 */

  }


  else 
  {
   echo "erreur manque paramétre";
    exit;
  }


?>