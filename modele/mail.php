<?php
require '../vendor/autoload.php';
use Nette\Mail\SendmailMailer;
use Nette\Mail\Message;

class Mail

{
  public function sendMail($mail){

#pour l'inscription
//mail
$req=$bdd->prepare("SELECT * FROM t_membres where  email=:email");
$req->execute(array('email' => $mail));
$mailClient= $req->fetch();

$mailer = new Nette\Mail\SmtpMailer(array(
  'host' => 'smtp.gmail.com',
  'port' => 465,
  'username' => 'owe.doshbank@gmail.com',#on prend ici l'address mail du salarie avec une variable de session
  'password' => 'azertyuiop789',#aucune idée la parcontre
  'secure' => 'ssl'
));

$mail = new Message();
$mail->setFrom('jules.duvivier@y-nov.com', 'OWE DOSHBANK')#requete SQL qui recupere l'address mail du mec qui essaye de s'inscrire
->addTo('jules.duvivier@y-nov.com')
->setSubject('Bienvenue sur WeTouch !')
->setBody("
Bonjour,
Voici vos identifiants pour vous connecter:

  N°Client: Zboub
  Mot de passe: Pute
  Pensez à changer votre mot de passe a votre premiere connexion.
  Merci a vous d'avoir choisis la Dosh-Bank de chez OWE et nous vous souhaitons bonne continuation.

  Cordialement
  DoshBank la banque de l'enfilade.
  ");

  $mailer->send($mail);

  #pour oublie de mdp
}
}

  ?>
