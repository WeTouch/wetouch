<h3> Chat </h3>
<?php
if ($this->data['tabMsg']=="")
{
	echo "No match yet";
}
else
{
	foreach ($this->data['tabMsg'] as $perso => $zboub)
	{
		$pos = stripos($perso,"*");
		$id = substr($perso,$pos+1,strlen($perso));

		echo "<div class='all'><div class='discussion'  onclick='Afficher(this)'><div class='afid' style='display:none;'>$id</div><h3 > Discussion avec " . substr($perso,0,$pos) . "</h3></div><br/><div class='Chat $id'><div id='afid2'  style='display:none;'>$id</div>";

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
					echo "<h5><b>" . $sender . " : </b>" . $msg . "<br/>";
				}

			}

		}
		echo'<form method="post" action="#">
		<input type="text" name="id" value=' . $id . ' style="width:20px; display:none;">
		<input type="text" name="message"/>
		<input type="submit" value="Envoyer"/>
		</form></div></div>';
	}

}
?>

<script>
function Afficher(el)
{

var zb2 = el.getElementsByClassName('afid')[0].innerHTML;
var zb = document.getElementsByClassName('Chat ' + zb2)[0];
var s = zb.style.display;
zb.style.display = (s == 'block') ? 'none' : 'block' ;


}
</script>
