<?php
require 'vendor/autoload.php';
use Nette\Mail\SendmailMailer;
use Nette\Mail\Message;

class SignInValidator {

  static function verifEmail($email)
  {
    require 'class/bdd.php';
    $req = $cnx->prepare("SELECT email FROM t_membres");
    $req->execute();
    while($mail = $req->fetch())
    {
      $tabMail[]=$mail['email'];
    }

    if(in_array($email,$tabMail ))
    {
       $msgerreur = "email déjà utilisé";
       return $msgerreur;
    }
    else
    {
      return True;

    }
  }
  static function verifSignIn($nom,$prenom,$email,$ddn,$genre,$password,$verifPassword)
  {
    require 'class/bdd.php';
    if(!empty($_POST)){
      $preference = null;
      if ($genre == "homme")
      {
        $preference = "femme";
      }
      else if ($genre == "femme")
      {
        $preference = "homme";
      }
      $q = array('nom'=>$nom, 'prenom'=>$prenom, 'email'=>$email, 'ddn'=>$ddn, 'genre'=>$genre, 'preference'=>$preference, 'password'=>$password);
      $req = $cnx->prepare("INSERT INTO t_membres (email, firstname, name, dob, preference, genre, password) VALUES (:email,:prenom, :nom, :ddn, :preference, :genre, :password)");
      $req->execute($q);



      $mailer = new Nette\Mail\SmtpMailer(array(
        'host' => 'smtp.gmail.com',
        'port' => 465,
        'username' => 'wetouchproject@gmail.com',#on prend ici l'address mail du salarie avec une variable de session
        'password' => 'zboubdeouf',#aucune idée la parcontre
        'secure' => 'ssl'
      ));
      $passHide="";
      $j=0;
      while($j<strlen($password)) { $passHide = $passHide . "*" ; $j+=1; };
      $mail = new Message();
      $mail->setFrom($email, 'WeTouch')#requete SQL qui recupere l'address mail du mec qui essaye de s'inscrire
      ->addTo($email)
      ->setSubject("Bienvenue sur WeTouch !")
      ->setBody("
      Bonjour " . $prenom . ",
      Voici vos identifiants pour vous connecter:

        Pseudo : " . $email . "
        Mot de passe: " . $passHide . "



        Cordialement
        WeTouch
        ");

        $mailer->send($mail);

      return True;
    }
    else
    {
      echo "Champs incomplet";
      return False;
    }
  }

}

?>
