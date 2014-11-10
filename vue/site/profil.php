<?php include("includes/header.php");?> 







		
		<form method="post" enctype="multipart/form-data" action="modele/site/upload.php">
<p>
<input type="file" name="fichier" size="30">
<input type="submit" name="upload" value="Uploader">
</p>
</form>


<?php for ($k=0;$k<sizeof($match);$k++)
{
$req3=$bdd->query("SELECT * FROM t_membres WHERE id = '$match[$k]'");
    while( $donnees= $req3->fetch())

     {
       $prenom = $donnees['firstname'];
	   $nom = $donnees['name'];
      } 
	  echo $prenom . " " . $nom . "<br/>";
}
?>

<?php include("includes/footer.php"); ?>
      
