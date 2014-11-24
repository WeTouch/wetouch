
<h2>Formulaire d'inscription :</h2>
<form action="signin" method="POST">
  <label for="nom">Nom: </label><br/>
  <input type="text" name="nom" required/><br/>

  <label for="prenom">Prenom : </label><br/>
  <input type="text" name="prenom" required/><br/>

  <label for="email">Email : </label><br/>
  <input type="text" name="email" required/><br/>

  <label>Date de naissance : </label><br/>
  <input type="date" name="ddn" required/><br/>

  <label>Genre : </label><br/>
  homme
  <input type="radio" name="genre" value="homme" required/><br/>
  femme
  <input type="radio" name="genre" value="femme" required/><br/>

  <label for="password">Password : </label><br/>
  <input type="password" name="password" required/><br/>

  <label for="password">Vérfication Password : </label><br/>
  <input type="password" name="verifpassword" required/><br/><br/>

  <input type="submit" value="S'inscrire"/>

</form><br/>
