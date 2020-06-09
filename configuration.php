<?php
// Entrer le non du repertoire à explorer exemple:  'documents'  ou:  'doc/public/abcde'
$data = 'C:\wamp64\www\ThibaultS';

// Entrer le non du repertoire ou la zip serra créé. il faut donner les droits en écriture
$destination = 'C:\wamp64\www\ThibaultS';

?>

<form action='' method='post' name='Form'>
<table width='100%' border='0' cellspacing='1' cellpadding='1'>
<label>Fichier</label> :  <select name="liste_fichiers">

<?php
$dirname = 'C:\wamp64\www\ThibaultS';
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

<input type="submit" name="supprimer" value="Supprimer" >
</table>
?>

<?php


// NE PAS MODIFIER APRES CETTE LIGNE

//$base = __DIR__ .'/'.$base;
$base = __DIR__;
//$data = $base.$data;
//$data = $data.'/';
$desti = __DIR__ .'/'.$destination ;
?>
