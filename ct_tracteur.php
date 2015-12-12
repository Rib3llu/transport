<?php
//On se connecte a la base
connectBase();
	 
// requête SQL qui compte le nombre total d'enregistrement dans la table et qui
//récupère tous les enregistrements
$select = "SELECT id_tracteur,marque,modele,immatriculation,date,visite,entretien,observation FROM tracteur WHERE visite < '$today'";
$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
$total = mysql_num_rows($result);
 
// si on a récupéré un résultat on l'affiche.
if($total) {
// debut du tableau
echo '<table class="table table-striped" align="center">'."\n";
// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne. 
while($row = mysql_fetch_array($result)) {
echo '<tr>';
echo '<td>'.$row["id_tracteur"].'</td>';
echo '<td>'.$row["marque"].'</td>';
echo '<td>'.$row["modele"].'</td>';
echo '<td>'.$row["immatriculation"].'</td>';
echo '<td>'.$row["date"].'</td>';
echo '<td>'.$row["visite"].'</td>';
echo '<td>'.$row["entretien"].'</td>';
echo '<td>'.$row["observation"].'</td>';
echo '<td><a href="mod_tracteur.php?id_tracteur='.$row["id_tracteur"].'"><button type="button" class="btn btn-default">Afficher</button></a></td>';
echo '</tr>'."\n";
}
echo '</table>'."\n";
// fin du tableau.
}
else echo 'Pas d\'enregistrements dans cette table...';
 
// on libère le résultat
mysql_free_result($result);
?>