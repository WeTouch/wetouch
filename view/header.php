<?php

if ((isset ($_SESSION['connexion'])) && ($_SESSION['connexion']==1))
{

  echo "connecté en tant que " . $_SESSION['name'];
}
?>

<html>
<header>
  <title>site</title>
  Ceci est un header
  <a href="<?php echo $app->urlFor('logout');?>">deconnection</a>
</header>
