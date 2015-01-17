

<div id="profil">
  <h1> Page profil  de <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['name']; ?> </h1>
  <div id="imgP"><img src=images/<?= $this->data['tab']['0']['photo_id']; ?> ></div>
  <div id="leftP">
    <h3>Informations personnelles </h3>

    <h5><b>Email : </b> <?= $this->data['tab']['0']['email'] ?></h5>
    <h5><b> Genre : </b> <?= $this->data['tab']['0']['genre'] ?></h5>
    <h5><b> Date de naissance : </b> <?= $this->data['tab']['0']['dob'] ?></h5>
    <h5><b> Position : </b> <?= $this->data['tab']['0']['position'] ?></h5>
    <form action="" method="POST" style='height:600px;'>
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
    <div id="RightP">
      <h3> A propos de moi </h3>
      <h5><b>Taille : </b> <?php if(sizeof($this->data['tabMore'])) { echo $this->data['tabMore']['0']['taille']; } ?> cm</h5>
      <h5><b>Poids : </b> <?php if(sizeof($this->data['tabMore'])) { echo $this->data['tabMore']['0']['poids']; } ?> kg</h5>
      <h5><b>Couleur des cheveux : </b> <?php if(sizeof($this->data['tabMore'])) { echo $this->data['tabMore']['0']['couleurCheveux']; } ?></h5>
      <h5><b>Couleur des yeux : </b> <?php if(sizeof($this->data['tabMore'])) { echo $this->data['tabMore']['0']['couleurYeux']; } ?></h5>
      <h5><b>Bijoux corporelles : </b> <?php if(sizeof($this->data['tabMore'])) { echo $this->data['tabMore']['0']['bijoux']; } ?></h5>
      <h5><b>Fumeur : </b> <?php if(sizeof($this->data['tabMore'])) { echo $this->data['tabMore']['0']['fumeur'] ; }?></h5>
      <h5><b>Origine : </b> <?php if(sizeof($this->data['tabMore'])) { echo $this->data['tabMore']['0']['origine']; } ?></h5>
      <h5><b>Formation : </b> <?php if(sizeof($this->data['tabMore'])) { echo $this->data['tabMore']['0']['formation']; } ?></h5>
      <h5><b>Situation professionnelle : </b> <?php if(sizeof($this->data['tabMore'])) { echo $this->data['tabMore']['0']['situation']; } ?></h5>
      <h5><b>Statut sentimental : </b> <?php if(sizeof($this->data['tabMore'])) { echo $this->data['tabMore']['0']['statut']; } ?></h5>
      <h5><b>Que cherches-tu ? : </b> <?php if(sizeof($this->data['tabMore'])) { echo $this->data['tabMore']['0']['cherche']; } ?></h5>
      <h5><b>Que fais-tu durant ton temps libre ? : </b> <?php if(sizeof($this->data['tabMore'])) { echo $this->data['tabMore']['0']['libre']; } ?></h5>

      <a href="<?php echo $app->urlFor('ModifprofilMore');?>" class="btn btn-default">Modifier mes informations personnelles</a>
    </div>
  </div>
