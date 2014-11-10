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
          <h2>Mes missions</h2>
          <?php
          //On liste les missions récupérées via la requete
          foreach($missions as $mission)
          {
          ?>
          <form class="form text-center" role="form" method="POST" action="index.php?section=profil">
            <div class="form-group">
              <label class="sr-only" for="titre">Titre</label>
              <input type="text" class="form-control" id="titre" name="titre" placeholder="titre" value="<?php echo $mission['titre']; ?>">
            </div>
            <div class="form-group">
              <label class="sr-only" for="lieu">Lieu</label>
              <input type="text" class="form-control" id="lieu" name="lieu" placeholder="lieu" value="<?php echo $mission['lieu']; ?>">
            </div>
            <div class="form-group">
              <label class="sr-only" for="description">Description</label>
              <textarea class="form-control" id="description" name="description" placeholder="description"><?php echo $mission['description']; ?></textarea>
            </div>
            <?php /*
            On passe des variables invisibles àl'oeil nu */ ?>
            <input type="hidden" name="id_utilisateur" value="<?php echo $_SESSION['id'];?>" />
            <input type="hidden" name="id" value="<?php echo $mission['id']; ?>" />
            <input type="hidden" name="action" value="update" />
            <button type="submit" class="btn btn-default">Modifier</button>
          </form>
          <?php //lien de suppression avec l'action delete en $_GET ?>
          <em><a href="index.php?section=profil&action=delete&id=<?php echo $mission['id']; ?>">supprimer</a></em>
          <?php
          }
          ?>
          </div>
      </div>
<?php include("includes/footer.php"); ?>
      
