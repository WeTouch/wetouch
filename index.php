<?php

//Require
require 'class/Slim/Slim.php';
require 'class/test.php';
require 'class/bdd.php';
require 'modele/loginValidator.php';
require 'modele/SignInValidator.php';
require 'modele/logout.php';
require 'modele/Match.php';
require 'modele/FindPicture.php';
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
      header('Location:/wetouch');die;
    }
    else{
      header('Location:/wetouch/login');die;
    }
  });

  $app->get('/mypictures',function() use ($app){
    $mypictures = new FindPicture();
    $tabPicture=array();
    $tabPicture=$mypictures->getPicture();
    $app->render('mypictures.php');
  })->name('pictures');


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
  $is_match->getMatch();
  $app->render('tind.php');
  $is_match->displayMatch();
  })->name('tind');



  $app->render('header.php', compact('app'));
  $app->run();
  $app->render('footer.php', compact('app'));

  ?>
