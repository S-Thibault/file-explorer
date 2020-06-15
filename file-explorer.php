<html>
<head>
	<title>Files-Explorer</title>
	<link rel="stylesheet" media="all" type="text/css" href="monstyle.css"/>
</head>
<body>
  

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="20000">
<!-- Le champs 'hidden' doit être défini avant le champs 'file'  -->
<label>Upload</label> :
<input type="file" name="mon_fichier"><br>
<input type="submit" value="Envoyer">
</form>

<?php

//Disable error report for undefined superglobals
error_reporting( error_reporting() & ~E_NOTICE );


// Suppression de fichier
  if (empty($_POST["suppr_fichier"])) {
    $text_suppr = "";
  }
  else {
      $del_fichier = $_POST["suppr_fichier"]; // variable se créé après avoir vérifier si le champ est vide ou pas
      if (!file_exists($del_fichier)) {
        $text_suppr= "Le fichier $del_fichier n'existe pas.";
      }
      else {
        if (is_dir($del_fichier)) {
          $text_suppr= "$del_fichier est un dossier et non un fichier.";
        }
        else {
          unlink($del_fichier);
          if (!file_exists($del_fichier)) {
            $text_suppr = "Le fichier $del_fichier a bien été supprimé.";
          }
        }
      }
    }

    echo $text_dossier; // Va afficher les différents messages selon les résultats des "if"  mais on peut le mettre en dessous du formulaire comme ci-dessous
    ?>


            <!-- Suppression de fichier -->
    <div class="col-sm p-3 mb-2 bg-dark text-white text-center rounded border border-light">
      <form class="mb-2" action="index.php" method="post">
         <label for="suppr_fichier" class="text-uppercase font-weight-bold">suppression de fichier</label>
         <input type="text" placeholder="Nom du fichier à supprimer" name="suppr_fichier"><button type="submit" class="ml-1">Supprimer</button>
      </form>

      <?php
        echo $text_suppr;
      ?>

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

if(!empty($_POST['envoyer'])) {
	$newdir = $_POST["new_dir"];
						 if (!file_exists($dir."/".$newdir)) {
								 mkdir($dir."/".$newdir, 0777, true);
						 }
					 }
?>

    		</div>
        		</div>

</td>
<td>



	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="text" name="new_dir" value="">
	    <input type="submit" id="envoyer" name="envoyer" value="creer un dossier">
	<form>

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
