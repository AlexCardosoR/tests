<?php

//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');



//BD


$base="mysql:host=localhost;dbname=root";
$login="root";
$mdp="";

//Vues

$vues['erreur']='vues/erreur.php';
$vues['vuehome']='vues/vuehome.php';
$vues['vueAdmin']='vues/vueAdmin.php';

?>