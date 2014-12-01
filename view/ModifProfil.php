

<div id="profil">
  <h1> Page profil  de <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['name']; ?> </h1>
  <div id="imgP"><img src=images/<?= $this->data['tab']['0']['photo_id']; ?> ></div>
  <h3>Informations personnelles </h3>

  <h5><b>Email : </b> <?= $this->data['tab']['0']['email'] ?></h5>
  <h5><b> Genre : </b> <?= $this->data['tab']['0']['genre'] ?></h5>
  <h5><b> Date de naissance : </b> <?= $this->data['tab']['0']['dob'] ?></h5>
  <h5><b> Position : </b> <?= $this->data['tab']['0']['position'] ?></h5>
  <form action="" method="POST">
    <h5><b> A propos de moi : </b> <textarea name="description" rows="3" cols="30"><?= $this->data['tab']['0']['description'] ?></textarea></h5>
    <h3> Préférences de découverte </h3>
    <label><h5><b>Genre : </b></label><br/>
      homme
      <input type="radio" name="genre" value="homme" /><br/>
      femme
      <input type="radio" name="genre" value="femme" checked/><br/></h5>

      <input type="submit" value="Modifier"/>

    </form>
  </div>
