<h3> Chat </h3>
<?php
foreach ($this->data['tabMsg'] as $perso => $zboub)
{
echo "<h3> Discussion avec " . $perso . "</h3><br/>";
  foreach($zboub as $message)
  {
    foreach($message as $sender => $msg)
    {
      echo "<h5><b>" . $sender ." : </b>" . $msg . "<br/>";
    }
  }
}


 ?>
