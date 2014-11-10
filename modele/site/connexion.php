<?php
session_start();
include("../connexion_bdd.php");
if(isset($_SESSION['utilisateur']) && $_SESSION['motDePasse'])
{
  echo "deja co";
}
elseif (isset($_POST['utilisateur']) AND $_POST['utilisateur']!="" AND isset($_POST['motDePasse']) AND $_POST['motDePasse']!="")  
{
  $mail= $_POST['utilisateur'];
  $req=$bdd->query("SELECT motDePasse FROM t_membres WHERE email='$mail'");
  while( $donnees= $req->fetch())
  {
    $passhash=$donnees['motDePasse'];
  }
  if (isset($passhash) && $passhash!="") 
  {
  }
  else
  {
    echo "Compte inexistant";
    exit;
  }
  if (password_verify( $_POST['motDePasse'] , $passhash))
  {
    $_SESSION['utilisateur']=$_POST['utilisateur'];
    $_SESSION['motDePasse']=$passhash;
    header('location:../../index.php');
  }
  else
  {
    echo "Mot de passe erroné";
  }
/*
  $req = $bdd->prepare('SELECT * FROM clients WHERE mail=:mail AND pass=:pass'); 
  $reponse = $req->execute(
  array('mail' => $_POST['utilisateur'],
  'pass' => $_POST['motDePasse']
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
