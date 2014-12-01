<?php
function __autoload ($nomClasse)
{
	require_once "modele/" . $nomClasse .".php";
}
?>
