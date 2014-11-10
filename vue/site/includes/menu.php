<div class="row">
	<div class="col-md-2 col-md-offset-3">
		<?php echo '<img class="img-circle img-responsive avatar" src="vue/site/assets/images/'.$_SESSION['id'].'.jpg" />';?>
	</div>
	<div class="col-md-4 text-center">
		<h1>ESPACE PERSONNEL DE <?=$_SESSION['prenom']." ".$_SESSION['nom'];?></h1>
		 <ul class="list-inline">
			<li ><a href="modele/site/deconnection.php">deconnection</a></li>
		</ul>
	</div>
</div>
    
