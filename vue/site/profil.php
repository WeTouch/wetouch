<?php include("includes/header.php"); ?>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h2>Nouvelle mission</h2>
          <form class="form text-center" role="form" method="POST" action="index.php?section=profil">
            <div class="form-group">
              <label class="sr-only" for="titre">Titre</label>
              <input type="text" class="form-control" id="titre" name="titre" placeholder="titre">
            </div>
            <div class="form-group">
              <label class="sr-only" for="lieu">Lieu</label>
              <input type="text" class="form-control" id="lieu" name="lieu" placeholder="lieu">
            </div>
            <div class="form-group">
              <label class="sr-only" for="description">Description</label>
              <textarea class="form-control" id="description" name="description" placeholder="description"></textarea>
            </div>
            <input type="hidden" name="id_utilisateur" value="<?php echo $_SESSION['id'];?>" />
            <input type="hidden" name="action" value="add" />
            <button type="submit" class="btn btn-default">Ajouter</button>
          </form>
        </div>
      </div>

       <div class="row">
        <div class="col-md-6 col-md-offset-3">
		
		
		<form method="post" enctype="multipart/form-data" action="modele/site/upload.php">
<p>
<input type="file" name="fichier" size="30">
<input type="submit" name="upload" value="Uploader">
</p>
</form>
</div>


          </div>
      </div>
<?php include("includes/footer.php"); ?>
      
