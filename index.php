<?php

//Require
require 'class/Slim/Slim.php';
require 'class/test.php';
require 'class/bdd.php';

\Slim\Slim::registerAutoloader();


//chargement slim
$app = new \Slim\Slim(
[
  'templates.path' => 'view'
]
);

$app->test= new Test();

// routes
$app->get('/',function() use ($app){
  $app->render('homepage.php');

});

$app->get('/contact',function() use ($app){
  $app->render('contact.php');

})->name('contact');

$app->get('/login',function() use ($app){
  $app->render('login.php');

})->name('login');


$app->post('/login',function() use ($app)
{
  $app->render('../modele/loginValidator.php');
});

$app->get('/logout',function() use ($app){
  $app->render('../modele/logout.php');

})->name('logout');
//exec
session_start();
$app->render('header.php', compact('app'));
$app->run();
$app->render('footer.php', compact('app'));
?>
