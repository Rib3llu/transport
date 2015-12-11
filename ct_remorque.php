<?php
//On se connecte a la base
connectBase();
	 
// requête SQL qui compte le nombre total d'enregistrement dans la table et qui
//récupère tous les enregistrements
$select = 'SELECT id_remorque,marque,modele,immatriculation,type,date,controle,revision,observation,longueur,largeur,hauteur FROM remorque WHERE "controle" < '. $today .'';
$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
$total = mysql_num_rows($result);
 
// si on a récupéré un résultat on l'affiche.
if($total) {
// debut du tableau
echo '<table bgcolor="#FFFFFF" align="center">'."\n";
// première ligne on affiche les titres prénom et surnom dans 2 colonnes
echo '<tr>';
echo '<td bgcolor="#669999"><b><u>Identifiant</u></b></td>';
echo '<td bgcolor="#669999"><b><u>Marque</u></b></td>';
echo '<td bgcolor="#669999"><b><u>Modèle</u></b></td>';
echo '<td bgcolor="#669999"><b><u>Immatriculation</u></b></td>';
echo '<td bgcolor="#669999"><b><u>Type</u></b></td>';
echo '<td bgcolor="#669999"><b><u>Date Construction</u></b></td>';
echo '<td bgcolor="#669999"><b><u>Date prochain Controle Technique</u></b></td>' ;
echo '<td bgcolor="#669999"><b><u>Date prochaine Révision</u></b></td>' ;
echo '<td bgcolor="#669999"><b><u>Observation</u></b></td>' ;
echo '<td bgcolor="#669999"><b><u>Longueur</u></b></td>' ;
echo '<td bgcolor="#669999"><b><u>Largeur</u></b></td>' ;
echo '<td bgcolor="#669999"><b><u>Hauteur</u></b></td>' ;
echo '<td bgcolor="#669999"><b><u>Modifier</u></b></td>' ;
echo '<td bgcolor="#669999"><b><u>Supprimer</u></b></td>' ;
echo '</tr>'."\n";
// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne. 
while($row = mysql_fetch_array($result)) {
echo '<tr>';
echo '<td bgcolor="#CCCCCC">'.$row["id_remorque"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["marque"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["modele"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["immatriculation"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["type"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["date"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["controle"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["revision"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["observation"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["longueur"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["largeur"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["hauteur"].'</td>';
echo '<td bgcolor="#CCCCCC" align="center"><form method="post" action="mod_remorque.php"><input type="hidden" name="id_remorque" value='.$row["id_remorque"].' /><input type="image" src="img/mod.jpg" width="32" height="32" border="0" alt="modifier" name="mod"></form></td>';
echo '<td bgcolor="#CCCCCC" align="center"><form method="post" action="supp_remorque.php"><input type="hidden" name="id_remorque" value='.$row["id_remorque"].' /><input type="image" src="img/supp.png" width="32" height="32" border="0" alt="supprimer" name="del_img"></form></td>';
echo '</tr>'."\n";
}
echo '</table>'."\n";
// fin du tableau.
}
else echo 'Pas d\'enregistrements dans cette table...';
 
// on libère le résultat
mysql_free_result($result);
?>