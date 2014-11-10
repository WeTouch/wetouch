<?php 
//Inclusion de mon header
include("includes/header.php"); 
?>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <?php // le formulaire pointe vers le script de connexion ?>
        <form class="form-inline text-center" role="form" method="POST" action="modele/site/connexion.php">
          <div class="form-group">
            <?php 
              //Gestion des erreurs suivant la connexion
              if(isset($_GET["erreur"])){
                switch ($_GET["erreur"]) {
                  case 'inconnu':
                    echo "Utilisateur inconnu";
                    break;
                  case 'form':
                    echo "Vous devez remplir les champs";
                    break;
                  default:
                    # code...
                    break;
                }
              }
            ?>
            <label class="sr-only" for="utilisateur">Utilisateur</label>
            <input type="text" class="form-control" id="utilisateur" name="utilisateur" placeholder="Saisie email">
          </div>
          <div class="form-group">
            <label class="sr-only" for="motDePasse">Mot de passe</label>
            <input type="password" class="form-control" id="motDePasse" name="motDePasse" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-default">Se connecter</button>
        </form>
        </div>
		<form method="post" action="modele/site/inscription.php">
        	<div class="col-lg-5 col-md-5 col-sm-5">
           
              <div class="form-group group">
             <label for="rf-titre">Titre</label>
                <div class="radio">
                <label><input class="form-control" type="radio" name="rf-titre" value="Monsieur" required>Monsieur  </label>
                <label><input class="form-control" type="radio" name="rf-titre" value="Madame" required>Madame  </label>
                <label><input class="form-control" type="radio" name="rf-titre" value="Mademoiselle" required>Mademoiselle  </label>
              </div>
              </div>
              <div class="form-group group">
                <label for="rf-name">Nom</label>
                <input type="text" class="form-control" name="rf-famillyname" id="rf-famillyname" placeholder="Nom" required>
              </div>
               <div class="form-group group">
                <label for="rf-name">Prénom</label>
                <input type="text" class="form-control" name="rf-name" id="rf-name" placeholder="Prénom" required>
              </div>

              
              </div>
            
         
          <div class="col-lg-7 col-md-7 col-sm-7">

              <div class="form-group group">
                <label for="rf-name">Date de naissance</label>
                <input type="date" class="form-control" name="rf-dob" id="rf-dob" placeholder="jj/mm/aaaa" required>
              </div>

              <div class="form-group group">
                <label for="rf-email">Email</label> <div style="color: red;" id="ok"></div>
                <input type="email" class="form-control" name="log-mail" id="rf-email" placeholder="Entrez email" oninput=" verifpseudodeux(); verifpseudo();" required>
              </div>
              <div class="form-group group">
                <label for="rf-password">Password</label>
                <input type="password" class="form-control" name="log-pass" id="rf-password" placeholder="Entrez mot de passe" required>
              </div>
              <div class="form-group group">
                <label for="rf-password-repeat">Vérification mot de passe</label> <div style="color: red;" id="okpass"></div>
                <input type="password" class="form-control" name="rf-password-repeat" id="rf-password-repeat" placeholder="Répetez mot de passe" oninput="verifpass();" required>
              </div>

              <div class="checkbox">
                <label><input type="checkbox" name="remember" required> J'ai lu et j'accepte les termes du contract</label>
              </div>

              <input id="boutoncheck" class="btn btn-success" type="submit" value="Inscription" onmouseover="  verifpseudodeux(); verifpseudo(); verifpass();">
              </div>
            </form>

      </div>
<?php 
//Inclusion du footer
include("includes/footer.php"); 
?>