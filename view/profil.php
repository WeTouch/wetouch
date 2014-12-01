<div id="profil">
  <h1> Page profil  de <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['name']; ?> </h1>
  <div id="imgP"><img src=images/<?= $this->data['tab']['0']['photo_id']; ?> ></div>
  <h3>Informations personnelles </h3>
  <h5><b>Email : </b> <?= $this->data['tab']['0']['email'] ?></h5>
  <h5><b> Genre : </b> <?= $this->data['tab']['0']['genre'] ?></h5>
  <h5><b> Date de naissance : </b> <?= $this->data['tab']['0']['dob'] ?></h5>
  <h5><b> Position : </b> <?= $this->data['tab']['0']['position'] ?></h5>
  <h5><b> A propos de moi : </b> <?= $this->data['tab']['0']['description'] ?></h5>
  <h3> Préférences de découverte </h3>
  <h5><b>Genre : </b> <?= $this->data['tab']['0']['preference'] ?></h5>

  <a href="<?php echo $app->urlFor('Modifprofil');?>">Modifier mes informations</a>
</div>
