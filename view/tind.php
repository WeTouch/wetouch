<?php
$timestamp = strtotime( $this->data['people']['dob']);
$dateNow = time();
$ageSec = $dateNow-$timestamp;
$age = floor($ageSec / (365*24*60*60));

?>
<div id="people">
	<div id="info">
		<h3><?php echo $this->data['people']['firstname'] . " - " .  $age . " ans"; ?></h3>
		<h6><?php echo $this->data['people']['description']; ?></h6>
	</div>
	<div id="contentPortofolio">
		<div id="contentcontent">
			<section id="portfolio" class="container lol">
		        <ul class="portfolio-items col-3">
		            <li class="portfolio-item joomla bootstrap">
		                <div class="item-inner">
		                    <img src="images/<?php echo $this->data['people']['photo_id'];?>" alt="">
		                    <h5></h5>
		                    <div class="overlay">
		                        <form method="post" enctype="multipart/form-data" class="preview">
									<button onmouseover="showButton()"  onmouseout="hideButton()" type="submit" name="beau" value="1"  class="preview btn btn-success" ><i class="glyphicon glyphicon-heart"></i></button>
									<button onmouseover="showButton()"  onmouseout="hideButton()" type="submit" name="beau" value="0" class="preview btn btn-danger" ><i class=" icon-remove"></i></button>
								</form>
		                    </div>
		                </div>
		            </li><!--/.portfolio-item-->
		        </ul>
			</section>
		</div>
	</div>

	<div id="infoC">
	<h5>	<?= $this->data['info']['taille'];?> </h5>

	</div>
</div>










<script>
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
