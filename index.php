

<?php

//Require
require 'class/Slim/Slim.php';
require 'class/test.php';
require 'class/bdd.php';
require 'modele/loginValidator.php';
require 'modele/SignInValidator.php';
require 'modele/logout.php';
require 'modele/Match.php';
require 'modele/chat.php';
require 'modele/chatValidator.php';
require 'modele/Picture.php';
require 'modele/getProfil.php';
require 'modele/ModifProfilValidator.php';

session_start();
\Slim\Slim::registerAutoloader();


//chargement slim
$app = new \Slim\Slim([
  'templates.path' => 'view'
  ]);

  $app->test= new Test();

  // routes
  $app->get('/',function() use ($app){
    if(!isset($_SESSION['id']))
    {
      $app->render('login.php');
      $app->render('signin.php');
    }
  })->name('index');

  $app->get('/contact',function() use ($app){
    $app->render('contact.php');
  })->name('contact');

  $app->get('/login',function() use ($app){
    $app->render('login.php');
  })->name('login');


  $app->post('/login',function() use ($app){

    $is_logged = loginValidator::verifLogin($_POST['email'],$_POST['password']);
    if ($is_logged) {
      echo 'test1';
      header('Location:/wetouch');die;
    }
    else{
      echo 'test2';
      header('Location:/wetouch/login');die;
    }
  });

  $app->get('/mypictures',function() use ($app){
    $mypictures = new Picture();
    $tabPicture=array();
    $tabPicture=$mypictures->getPicture();
    $app->render('mypictures.php',array("tab" => $tabPicture));
  })->name('pictures');

  $app->post('/mypictures',function() use ($app){
    $pic = new Picture();
    if (isset($_POST['upload'])) {
      $pic->add();
      header('Location:/wetouch/mypictures');die;
    }
    else if (isset($_POST['del']))
    {
      $pic->delete();
      header('Location:/wetouch/mypictures');die;
    }
    else
    {
      $pic->favorit();
      header('Location:/wetouch/mypictures');die;
    }
  });


  $app->get('/logout',function() use ($app){
    logout::function_logout();
    header('Location:/wetouch/');die;
  })->name('logout');


  $app->get('/signin',function() use ($app){
    $app->render('signin.php');
  })->name('signin');

  $app->post('/signin',function() use ($app){

    $is_signin = SignInValidator::verifSignIn($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['ddn'],$_POST['genre'],$_POST['password'],$_POST['verifpassword']);
    if ($is_signin) {
      header('Location:/wetouch/login');die;
    }
    else{
      header('Location:/wetouch/signin');die;
    }
  });
  //exec


  $app->get('/tind',function() use ($app){
  $is_match = new Match();
  if($is_match->getMatch())
  {
    $is_match->displayMatch();
  }
  else
  {
    echo "plus personne ";
  }
  $app->render('tind.php');
})->name('match');

  $app->post('/tind',function() use ($app){
  $is_match = new Match();
  $is_match->getMatch();
  $is_match->vote();
  header('Location:/wetouch/tind');die;
});

$app->get('/chat',function() use ($app){
  $match = new chat();
  $match->getTalker();
  $app->render('chat.php');
  $match->displayMatchForChat();
})->name('chat');

$app->post('/chat',function() use ($app)
{
  $chat = chatValidator::sendMsg($_POST['id'],$_POST['message']);
  header('Location:/wetouch/chat');die;

});

$app->get('/profil',function() use ($app){
  $myInformations = new getProfil();
  $tabInformations=array();
  $tabInformations=$myInformations->getInformations();
  $app->render('profil.php',array("tab" => $tabInformations));
})->name('profil');

$app->get('/Modifprofil',function() use ($app){
  $myInformations = new getProfil();
  $tabInformations=array();
  $tabInformations=$myInformations->getInformations();
  $app->render('Modifprofil.php',array("tab" => $tabInformations));
})->name('Modifprofil');

$app->post('/Modifprofil', function() use ($app)
{
  $profil = new ModifProfilValidator();
  $profil->verifProfil($_POST['description'],$_POST['genre']);
  header('Location:/wetouch/profil');die;
});


  $app->render('header.php', compact('app'));
  $app->run();
  $app->render('footer.php', compact('app'));

  ?>
