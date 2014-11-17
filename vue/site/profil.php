<?php include("includes/header.php");?> 







		
		<form method="post" enctype="multipart/form-data" action="modele/site/upload.php">
<p>
<input type="file" name="fichier" size="30">
<input type="submit" name="upload" value="Uploader">
</p>
</form>



<?php for ($k=0;$k<sizeof($match);$k++)
{
$req3=$bdd->query("SELECT * FROM t_membres WHERE id = '$match[$k]'");
    while( $donnees= $req3->fetch())

     {
       $prenom = $donnees['firstname'];
	   $nom = $donnees['name'];
      } 
	  echo "<b>" . $prenom . " " . $nom . "</b><br/>";
}
?>

<form method="post" action="modele/site/chat.php">
<input type="text" name="chat">
<input type="text" name="id">
<input type="button" name="text" onclick="send()" value="envoyer">
		</form>



<?php include("includes/footer.php"); ?>

<script type="javascript">
	
	function send()
{
  chat= document.getElementById("chat").value;
 id= document.getElementById("id").value;

var xhr;
//if (window.XMLHttpRequest)
 // {
  xhr=new XMLHttpRequest();
  //}
xhr.onreadystatechange=function test()
  {
  if (xhr.readyState==4 && xhr.status==200)
    {
    document.getElementById("ok").innerHTML=xhr.responseText;
    }
  }
xhr.open("POST","chat.php",true);
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xhr.send('config='+config+  '&id='+id );

} 

function actu()
{
  chat= document.getElementById("chat").value;
 id= document.getElementById("id").value;

var xhr;
//if (window.XMLHttpRequest)
 // {
  xhr=new XMLHttpRequest();
  //}
xhr.onreadystatechange=function test()
  {
  if (xhr.readyState==4 && xhr.status==200)
    {
    document.getElementById("ok").innerHTML=xhr.responseText;
    }
  }
xhr.open("POST","chat.php",true);
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xhr.send('config='+config+  '&id='+id );

} 
</script>      
