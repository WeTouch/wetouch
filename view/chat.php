<?php
$_SESSION['notification']=time();
?>

<div id="titreChat"><h2> Chat (<?=count($this->data['tabMsg']);?>) </h2></div>
<?php

foreach ($this->data['tabMsg'] as $perso => $zboub)
{
	$pos = stripos($perso,"*");
	$photo = stripos($perso,"~");
	$idz = substr($perso,$pos+1,$photo);
	$id = substr($idz,0,1);
	$photo_id = substr($perso,$photo+1,strlen($perso));

	echo "<div id='all'>
	<div id = 'floatLeft'>
	<div class='discussion'  onclick='Afficher(this)'>
	<div class='afid' style='display:none;'>$id</div>
	<a href='#'><h3 > Discussion avec " . substr($perso,0,$pos) . "</a><a href='userProfil?id=" . $id . "'><img class='imgChat' src = images/" . $photo_id . ">
	</a></h3>
	</div><br/>
	<div id='floatR'>
	<div class='floatRight $id'>
	<div class='entourChat $id'>
	<div class='Chat $id'>
	<div id='afid2'  style='display:none;'>$id
	</div>
	</div>";
	echo "<h3  id='h3Right'> " . substr($perso,0,$pos) . "</h3><br/>";
	foreach($zboub as $message)
	{
		foreach($message as $sender => $msg)
		{

			if ($msg == "No msg yet")
			{
				echo "<h5> Pas encore de message ! </h5>";
			}
			else
			{
				echo "<h5><b>" . $sender . " : </b>" .htmlentities($msg) . "<br/>";
			}
		}
	}
	echo'<form method="post" action="#">
	<input type="text" name="id" value=' . $id . ' style="width:20px; display:none;">
	<input type="text" name="message"/>
	<input type="submit" value="Envoyer"/>
	</form></div></div></div></div></div>';
}
?>

<script>
function Afficher(el)
{

	var zb2 = el.getElementsByClassName('afid')[0].innerHTML;
	var n = zb2.indexOf("~");
	var zb3 = zb2.substring(0,n);
	var zb4 = zb2.substring(n-2,zb2.length);
	var zb99 = document.getElementsByClassName('entourChat');
	for(var i = 0, length = zb99.length; i < length; i++) {
		zb99[i].style.display = 'none';

	}
	var zb = document.getElementsByClassName('entourChat ' + zb4)[0];
	var s = zb.style.display;
	zb.style.display = (s == 'block') ? 'none' : 'block' ;


}
</script>
