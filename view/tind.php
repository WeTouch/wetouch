<?php
$timestamp = strtotime( $this->data['people']['dob']);
$dateNow = time();
$ageSec = $dateNow-$timestamp;
$age = floor($ageSec / (365*24*60*60));

?>
<div id="people">
	<div id="info">
		<h3><?php echo $this->data['people']['firstname'] . " - " .  $age . " ans"; ?></h3>
		<h6><?php echo $this->data['people']['description'];  ?></h6>
	</div>

	<div id="contentPortofolio">
		<div class="carousel slide article-slide" id="article-photo-carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner cont-slider">
    <?php $count = 0;
    foreach ($this->data['img'] as $key) {
      $count +=1;
      if($count==1)
      {
        echo '
                <div class="portfolio-item joomla item-inner item active">
                  <img src="images/'.$key.'" alt="">
                  <div class="overlay">  
                    <form method="post" enctype="multipart/form-data" class="preview">  
                      <button onmouseover="showButton()" onmouseout="hideButton()" type="submit" name="beau" value="1" class="preview btn btn-success"><i class="glyphicon glyphicon-heart"></i></button>
                      <button onmouseover="showButton()" onmouseout="hideButton()" type="submit" name="beau" value="0" class="preview btn btn-danger"><i class=" icon-remove"></i></button>
                    </form>   
                  </div>           
                </div>           
              ';
      }
      else
      { ?>
        <div class=" portfolio-item joomla item">
          <img alt="" title="" src="images/<?= $key; ?>">
          <div class="overlay">  
            <form method="post" enctype="multipart/form-data" class="preview">  
              <button onmouseover="showButton()" onmouseout="hideButton()" type="submit" name="beau" value="1" class="preview btn btn-success"><i class="glyphicon glyphicon-heart"></i></button>
              <button onmouseover="showButton()" onmouseout="hideButton()" type="submit" name="beau" value="0" class="preview btn btn-danger"><i class=" icon-remove"></i></button>
            </form>   
          </div> 
        </div>
    <?php }} ?>
  </div>
  <!-- Indicators -->
  <ol class="carousel-indicators">
  	<?php $count = -1;

  	foreach ($this->data['img'] as $key) {
  		$count +=1;
  		?>
    <li class="active" data-slide-to="<?php echo $count; ?>" data-target="#article-photo-carousel">
      <img alt="" src="images/<?= $key; ?>">
    <?php } ?>
  </ol>
</div>
	</div>
	<div id="contentInfos">
	<h3> A propos de moi </h3>
  <h5><b>Taille : </b> <?= $this->data['info']['taille'] ?> cm</h5>
  <h5><b>Poids : </b> <?= $this->data['info']['poids'] ?> kg</h5>
  <h5><b>Couleur des cheveux : </b> <?= $this->data['info']['couleurCheveux'] ?></h5>
  <h5><b>Couleur des yeux : </b> <?= $this->data['info']['couleurYeux'] ?></h5>
  <h5><b>Bijoux corporelles : </b> <?= $this->data['info']['bijoux'] ?></h5>
  <h5><b>Fumeur : </b> <?= $this->data['info']['fumeur'] ?></h5>
  <h5><b>Origine : </b> <?= $this->data['info']['origine'] ?></h5>
  <h5><b>Formation : </b> <?= $this->data['info']['formation'] ?></h5>
  <h5><b>Situation professionnelle : </b> <?= $this->data['info']['situation'] ?></h5>
  <h5><b>Statut sentimental : </b> <?= $this->data['info']['statut'] ?></h5>
  <h5><b>Je cherche : </b> <?= $this->data['info']['cherche'] ?></h5>
  <h5><b>Durant mon temps libre : </b> <?= $this->data['info']['libre'] ?></h5>
</div>

</div>




<style type="text/css">
/* Main carousel style */
.carousel {
    width: 600px;
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





<script>
// Stop carousel
$('.carousel').carousel({
  interval: false
});
function showButton()
{
	var button = document.getElementsByClassName("tindbtn");
	button[0].style.visibility="visible";
	button[1].style.visibility="visible";

}

function hideButton()
{
	var button = document.getElementsByClassName("tindbtn");
	button[0].style.visibility="hidden";
	button[1].style.visibility="hidden";

}
</script>
