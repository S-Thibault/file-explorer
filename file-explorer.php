<?php

//Disable error report for undefined superglobals
error_reporting( error_reporting() & ~E_NOTICE );

//Security options
$allow_delete = true; // Set to false to disable delete button and delete POST request.
$allow_create_folder = true; // Set to false to disable folder creation
$allow_upload = true; // Set to true to allow upload files
$allow_direct_link = true; // Set to false to only allow downloads and not direct link
// Sometimes you may need to hide sensitive files. Add them here
$files_to_skip = array(
    '.',
    '..',
    'index.php'
);



?>

<html>
<head>
	<title>Files-Explorer</title>
	<link rel="stylesheet" media="all" type="text/css" href="monstyle.css"/>
</head>
<body>
<br>

<?php
include 'configuration.php';
include 'fonctions.php';

if(isset($_GET['dir'])) //si $_GET['dir'] existe
{
$dir = $_GET['dir'];
}
else
{
$dir = "";

}
$chemin = $data.'/'.$dir;
?>
<div class="contenu">
  <div class="gauche">

  </div>
  <div class="black">
  <h1> Files Explorer </h1>
  </div>
  <div class="droit">
  </div>
  <div class="gauche">
  </div>
  <div class="main">
  <div class="tableau">
  <span class="plein">
    <table width="100%" border="0" cellspacing="0">
      <tr><td>
        <div class="centrer">
        </div>
        <?php
          echo '<a href='.$_SERVER['PHP_SELF'].'><img src="images/dir-close.gif" border=0 />&nbsp;/</a><br/>';
          explorer_rep($data, $chemin, 1);

					function moveFile($dossierSource , $dossierDestination){
				 
				      $retour = 1;
				      if(!file_exists($dossierSource)) {
				       $retour = -1;
				      } else {
				       if(!copy($dossierSource, $dossierDestination)) {
				       $retour = -2;
				       } else {
				       if(!unlink($dossierSource)) {
				       $retour = -3;
				       }
				       }
				      }
				      return($retour);
				     }
        ?>
    		</div>
        		</div>

</td>
<td>

<table width="100%" border="0" cellspacing="0">
  <tr>
    <th>Nom</th>
    <th>Taille</th>
    <th>Dernière modif</th>
    <th>Type</th>
    <th>Extention</th>
    <th>Dernier accès</th>
    <th>Permission</th>
  </tr>

  <?php
    explorer_fichier($chemin);
  ?>

  </body>
  </html>
