<?php
// Entrer le non du repertoire à explorer exemple:  'documents'  ou:  'doc/public/abcde'
$data = 'partage';

// Entrer le non du repertoire ou la zip serra créé. il faut donner les droits en écriture
$destination = 'zip';

<?php

if(isset($_POST['supprimer'])){
 // Le bouton supprimer a été cliqué
 $fichier_a_supprimer=$_POST['liste_fichiers'];
 if( file_exists ( "nouveau dossier/$fichier_a_supprimer")){
  $effacer=unlink("nouveau dossier/$fichier_a_supprimer");
  if($effacer){
   echo "Le fichier ".$fichier_a_supprimer." a bien été supprimé !";
  }
  else
  {
  echo "Le fichier ".$fichier_a_supprimer." n'a pas pu être supprimé !";
  }
  }
  else
  {
  echo "Fichier ".$fichier_a_supprimer." non trouvé !!";
 }
}
?>
<form action='' method='post' name='Form'>
<table width='100%' border='0' cellspacing='1' cellpadding='1'>
<label>Fichier</label> :  <select name="liste_fichiers">
<?php
$dirname = 'nouveau dossier';
$dir = opendir($dirname);

$array_liste_fichiers=array();
while($file = readdir($dir)) {
if($file != '.' && $file != '..' && !is_dir($dirname.$file))
{
$array_liste_fichiers[]=$file;
}
}
closedir($dir);

for($i=0;$i<sizeof($array_liste_fichiers);$i++){
echo '<option value="'.$array_liste_fichiers[$i].'">'.$array_liste_fichiers[$i].'</option>';
}

?>
<input type="submit" name="supprimer" value="Supprimer" >
</table>


// NE PAS MODIFIER APRES CETTE LIGNE

//$base = __DIR__ .'/'.$base;
$base = __DIR__;
//$data = $base.$data;
//$data = $data.'/';
$desti = __DIR__ .'/'.$destination ;
?>
