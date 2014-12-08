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
require 'modele/ModifProfilMoreValidator.php';

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
    else
    {
      $app->redirect($app->urlFor('match'));
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
      $app->redirect($app->urlFor('index'));
    }
    else{
      echo 'test2';
      $app->redirect($app->urlFor('login'));
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
    }
    else if (isset($_POST['del']))
    {
      $pic->delete();
    }
    else
    {
      $pic->favorit();
    }
    $app->redirect($app->urlFor('pictures'));
  });


  $app->get('/logout',function() use ($app){
    logout::function_logout();
    $app->redirect($app->urlFor('index'));
  })->name('logout');


  $app->get('/signin',function() use ($app){
    $app->render('signin.php');
  })->name('signin');

  $app->post('/signin',function() use ($app){
    $is_email = SignInValidator::verifEmail($_POST['email']);

    if ($is_email==1) {
    $is_signin = SignInValidator::verifSignIn($_POST['name'],$_POST['prenom'],$_POST['email'],$_POST['ddn'],$_POST['genre'],$_POST['password'],$_POST['verifpassword']);
    if ($is_signin) {
      $app->redirect($app->urlFor('login'));
    }
    else{
      $app->redirect($app->urlFor('signin'));
    }
  }
  else
  {
    echo $is_email;
  }
  });
  //exec


  $app->get('/tind',function() use ($app){
  $is_match = new Match();
  if($is_match->getMatch())
  {
    $is_match->displayMatch();
    $people = $is_match->displayMatch();
    $app->render('tind.php',array("people"=>$people));

  }
  else
  {
    echo "plus personne ";
  }

})->name('match');

  $app->post('/tind',function() use ($app){
  $is_match = new Match();
  $is_match->getMatch();
  $is_match->vote();
  $app->redirect($app->urlFor('match'));
});

$app->get('/chat',function() use ($app){
  $match = new chat();
  $match->getTalker();
  $tabMsg = $match->displayMatchForChat();
  $app->render('chat.php',array("tabMsg"=>$tabMsg));
})->name('chat');

$app->post('/chat',function() use ($app)
{
  $chat = chatValidator::sendMsg($_POST['id'],$_POST['message']);
  $app->redirect($app->urlFor('chat'));

});

$app->get('/profil',function() use ($app){
  $myInformations = new getProfil();
  $tabInformations=array();
  $tabMoreInformations=array();
  $tabInformations=$myInformations->getInformations();
  $tabMoreInformations = $myInformations->getMoreInformations();
  $app->render('profil.php',array("tab" => $tabInformations,"tabMore" => $tabMoreInformations));
})->name('profil');

$app->get('/Modifprofil',function() use ($app){
  $myInformations = new getProfil();
  $tabInformations=array();
  $tabMoreInformations=array();
  $tabInformations=$myInformations->getInformations();
  $tabMoreInformations = $myInformations->getMoreInformations();
  $app->render('Modifprofil.php',array("tab" => $tabInformations,"tabMore" => $tabMoreInformations));
})->name('Modifprofil');
$app->post('/Modifprofil', function() use ($app)
{
  $profil = new ModifProfilValidator();
  $profil->verifProfil($_POST['description'],$_POST['genre']);
  $app->redirect($app->urlFor('profil'));
});

$app->get('/ModifprofilMore',function() use ($app){
  $myInformations = new getProfil();
  $tabInformations=array();
  $tabMoreInformations=array();
  $tabInformations=$myInformations->getInformations();
  $tabMoreInformations = $myInformations->getMoreInformations();
  $app->render('ModifprofilMore.php',array("tab" => $tabInformations,"tabMore" => $tabMoreInformations));
})->name('ModifprofilMore');
$app->post('/ModifprofilMore', function() use ($app)
{
  $profil = new ModifProfilMoreValidator();
  $profil->verifProfilMore($_POST['taille'],$_POST['poids'],$_POST['couleurCheveux'],$_POST['couleurYeux'],$_POST['bijoux'],$_POST['fumeur'],$_POST['origine'],$_POST['formation'],$_POST['situation'],$_POST['statut'],$_POST['cherche'],$_POST['libre']);
  $app->redirect($app->urlFor('profil'));
});

  $app->render('header.php', compact('app'));
  $app->run();
  $app->render('footer.php', compact('app'));

  ?>
