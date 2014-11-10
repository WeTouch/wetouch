<?php

$id = $_SESSION['id'];
$req=$bdd->query("SELECT vote FROM t_result WHERE result=1 AND voter='$id'" );

    while( $donnees= $req->fetch())

     {
       $zboub[] =  $donnees['vote'];
      }
	  

$req2=$bdd->query("SELECT voter FROM t_result WHERE result=1 AND vote='$id'");

    while( $donnees= $req2->fetch())

     {
       $zboub2[] =  $donnees['voter'];
      }


for ($i=0;$i<sizeof($zboub);$i++)
{
for ($j=0;$j<sizeof($zboub2);$j++)
{
if ($zboub[$i]==$zboub2[$j])
{
$match[] =  $zboub[$i];
}
}
}

var_dump($match);


?>
