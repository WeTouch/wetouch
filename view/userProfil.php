<?php
$idpers =  $_GET['id'];
if (!empty($this->data['allMatch']))
{
if (in_array($idpers, $this->data['allMatch']))
{

  if (!empty($this->data['tabUser']['0']))
  {


    ?>

    <div id="profil">
      <h1> Page profil  de <?= $this->data['tabUser']['0']['firstname'] . ' ' . $this->data['tabUser']['0']['name']  ?></h1>

      <div id="contentPortofolio">
        <div class="carousel slide article-slide" id="article-photo-carousel">

          <!-- Wrapper for slides -->
          <div class="carousel-inner cont-slider">
            <?php
            if (!empty($this->data['imgUser']))
            {
              $count = 0;
              foreach ($this->data['imgUser'] as $key) {
                $count +=1;
                if($count==1)
                {
                  echo '<div class="item active"><img alt="" title="" src="images/'.$key.'"></div>';
                }
                else{
                  ?>

                  <div class="item">
                    <img alt="" title="" src="images/<?= $key; ?>">
                  </div>
                  <?php }}}
                  else
                  {
                    echo '<div class="item active"><img alt="" title="" src="images/homme.jpg"></div>';
                  } ?>
                </div>
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <?php $count = -1;

                  foreach ($this->data['imgUser'] as $key) {
                    $count +=1;
                    ?>
                    <li class="active" data-slide-to="<?php echo $count; ?>" data-target="#article-photo-carousel">
                      <img alt="" src="images/<?= $key; ?>">
                      <?php } ?>
                    </ol>
                  </div>
                </div>

                <div id="leftP">
                  <h3>Informations personnelles </h3>
                  <h5><b>Email : </b> <?= $this->data['tabUser']['0']['email'] ?></h5>
                  <h5><b> Genre : </b> <?= $this->data['tabUser']['0']['genre'] ?></h5>
                  <h5><b> Date de naissance : </b> <?= $this->data['tabUser']['0']['dob'] ?></h5>
                  <h5><b> Position : </b> <?= $this->data['tabUser']['0']['position'] ?></h5>
                  <h5><b> A propos de  <?= $this->data['tabUser']['0']['firstname']?>: </b> <?= $this->data['tabUser']['0']['description'] ?></h5>
                  <br/><br/>
                  <h3> Préférences de découverte </h3>

                  <h5><b>Genre : </b> <?= $this->data['tabUser']['0']['preference'] ?></h5>
                </div>
                <?php
                if (!empty($this->data['tabUserMore']['0']))
                {?>
                  <div id="rightP">  <h3> A propos de  <?= $this->data['tabUser']['0']['firstname']?>  </h3>
                    <h5><b>Taille : </b> <?= $this->data['tabUserMore']['0']['taille'] ?> cm</h5>
                    <h5><b>Poids : </b> <?= $this->data['tabUserMore']['0']['poids'] ?> kg</h5>
                    <h5><b>Couleur des cheveux : </b> <?= $this->data['tabUserMore']['0']['couleurCheveux'] ?></h5>
                    <h5><b>Couleur des yeux : </b> <?= $this->data['tabUserMore']['0']['couleurYeux'] ?></h5>
                    <h5><b>Bijoux corporelles : </b> <?= $this->data['tabUserMore']['0']['bijoux'] ?></h5>
                    <h5><b>Fumeur : </b> <?= $this->data['tabUserMore']['0']['fumeur'] ?></h5>
                    <h5><b>Origine : </b> <?= $this->data['tabUserMore']['0']['origine'] ?></h5>
                    <h5><b>Formation : </b> <?= $this->data['tabUserMore']['0']['formation'] ?></h5>
                    <h5><b>Situation professionnelle : </b> <?= $this->data['tabUserMore']['0']['situation'] ?></h5>
                    <h5><b>Statut sentimental : </b> <?= $this->data['tabUserMore']['0']['statut'] ?></h5>
                    <h5><b>Que cherches-tu ? : </b> <?= $this->data['tabUserMore']['0']['cherche'] ?></h5>
                    <h5><b>Que fais-tu durant ton temps libre ? : </b> <?= $this->data['tabUserMore']['0']['libre'] ?></h5

                    </div>
                    <?php }?>
                  </div>
                  <?php }
                  else
                  {
                    $app->render("NoUser.php");
                  }
                }
              }
                else
                {
                  $app->render("NoUser.php");
                }?>



                <style type="text/css">
                /* Main carousel style */
                .carousel {
                  width: 400px;
                }

                /* Indicators list style */
                .article-slide .carousel-indicators {
                  bottom: -50px;
                  left: 0;
                  margin-left: 5px;
                  width: 100%;
                }
                .carousel-indicators
                {
                  position: relative;

                }
                /* Indicators list style */
                .article-slide .carousel-indicators li {
                  border: medium none;
                  border-radius: 0;
                  float: left;
                  height: 54px;
                  margin-bottom: 5px;
                  margin-left: 0;
                  margin-right: 5px !important;
                  margin-top: 0;
                  width: 100px;
                }
                /* Indicators images style */
                .article-slide .carousel-indicators img {
                  border: 2px solid #FFFFFF;
                  float: left;
                  height: 54px;
                  left: 0;
                  width: 100px;
                }
                /* Indicators active image style */
                .article-slide .carousel-indicators .active img {
                  border: 2px solid #428BCA;
                  opacity: 0.7;
                }
                </style>
