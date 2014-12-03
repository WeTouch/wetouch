<section id="career" class="container">
    <div class="center">
    <div class="row">
      <div class="col-sm-100">
        <div class="panel-group" id="accordion1">
				<div class="panel panel-default">
				<div class="panel-heading">
				<div class="form-group">
						<center>
							<a href="<?php echo $app->urlFor('signin');?>"><h3>Vous n'avez pas de compte ?</h3></a><br/>
						</center>
						<div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
                  Formulaire d'inscription :
                </a>
              </h4>
            </div>
            <div id="collapseOne1" class="panel-collapse collapse">
              <div class="panel-body">
				<form action="signin" method="POST" >
					<div class="form-group">
						<input type="text" name="name" class="form-control" required="required" placeholder="Nom">
							<br/>
						<input type="text" name="prenom" class="form-control" required="required" placeholder="Prenom">
							<br/>
						<input type="text" name="email" class="form-control" required="required" placeholder="Email">
							<br/>
						<input type="date" name="ddn" class="form-control" required="required" placeholder="Date de naissance">
							<br/>
							<center><h3>
								Homme
							<center/>
						<input type="radio" name="genre" value="homme" class="form-control" required="required" placeholder="Homme">
							<br/>
							<center>
								Femme
							<center/></h3>
						<input type="radio" name="genre" value="femme" class="form-control" required="required" placeholder="Femme">
							<br/>
						<input type="password" name="password" class="form-control" required="required" placeholder="Password">
							<br/>
						<input type="password" name="verifpassword" class="form-control" required="required" placeholder="Vérfication Password">
							<br/>
						<input type="submit" value="S'inscrire"/>
							</div>
					</form>
              </div>
            </div>
          </div>
		
				</div>
				</div>
				</div>

        </div>
      </div>
    </div>
  </section>

