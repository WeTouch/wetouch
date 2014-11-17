<?php include("includes/header.php");?> 







		
		<form method="post" enctype="multipart/form-data" action="modele/site/upload.php">
<p>
<input type="file" name="fichier" size="30">
<input type="submit" name="upload" value="Uploader">
</p>
</form>


<<<<<<< HEAD
=======
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
>>>>>>> 5481b1ed9cc8e1997a1fe672ba6ea4522914588a

<?php include("includes/footer.php"); ?>
      
