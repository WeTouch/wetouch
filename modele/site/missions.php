<?php

$id = $_SESSION['id'];
$req=$bdd->query("SELECT vote FROM t_result WHERE result=1 AND voter='$id'" );

    while( $donnees= $req->fetch())

     {
       $zboub[] =  $donnees['vote'];
      }
	  

$req2=$bdd->query("SELECT voter FROM t_result WHERE result=1 AND vote='$id'");
<<<<<<< HEAD

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



for ($k=0;$k<sizeof($match);$k++)
{

$req3=$bdd->query("SELECT * FROM t_membres WHERE id = '$match[$k]'");

    while( $donnees= $req3->fetch())

     {
       $prenom = $donnees['firstname'];
	   $nom = $donnees['name'];
      } 
	  echo '<li>' . $prenom . ' ' . $nom . '</li>';
	  
$req4=$bdd->query("SELECT msg FROM t_chat WHERE (id_user1 = '$id' OR id_user1 = '$match[$k]') AND ( id_user2  = '$id' OR id_user2 = '$match[$k]' )");


    while($donnees = $req4->fetch())
     {
       $msg = $donnees['msg'];	    
     }
echo $msg . '<form method="post" action="modele/site/missions.php">
<input type="text">
<input type="submit" name="text" value="Send">
		</form>';	



	  

}
=======

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
>>>>>>> 5481b1ed9cc8e1997a1fe672ba6ea4522914588a


?>
