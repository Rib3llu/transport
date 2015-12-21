<?php
//On se connecte a la base
connectBase();
	 
// requête SQL qui compte le nombre total d'enregistrement dans la table et qui
//récupère tous les enregistrements
$select = "SELECT id_chauffeur,nom,prenom,tel,mail,permis,expiration FROM chauffeur WHERE expiration < '$today'";
$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
$total = mysql_num_rows($result);
 
// si on a récupéré un résultat on l'affiche.
if($total) {
// debut du tableau
echo '<table class="table table-striped" align="center">'."\n";
// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne. 
while($row = mysql_fetch_array($result)) {
echo '<tr>';
echo '<td>'.$row["id_chauffeur"].'</td>';
echo '<td>'.$row["nom"].'</td>';
echo '<td>'.$row["prenom"].'</td>';
echo '<td>'.$row["tel"].'</td>';
echo '<td>'.$row["mail"].'</td>';
echo '<td>'.$row["permis"].'</td>';
echo '<td><font color="red">'.$row["expiration"].'</font></td>';
echo '<td><a href="mod_chauffeur.php?id_chauffeur='.$row["id_chauffeur"].'"><button type="button" class="btn btn-default">Afficher</button></a></td>';
echo '</tr>'."\n";
}
echo '</table>'."\n";
// fin du tableau.
}
else echo 'Pas d\'enregistrements dans cette table...';
 
// on libère le résultat
mysql_free_result($result);
?>