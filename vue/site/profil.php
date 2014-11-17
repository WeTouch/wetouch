<?php include("includes/header.php");?> 







		
		<form method="post" enctype="multipart/form-data" action="modele/site/upload.php">
<p>
<input type="file" name="fichier" size="30">
<input type="submit" name="upload" value="Uploader">
</p>
</form>



<form method="post" action="modele/site/chat.php">
<input type="text" name="chat">
<input type="text" name="id">
<input type="submit" name="text" value="Send">
		</form>



<?php include("includes/footer.php"); ?>
      
