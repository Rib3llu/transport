<?php
//On se connecte a la base
connectBase();
	 
// requête SQL qui compte le nombre total d'enregistrement dans la table et qui
//récupère tous les enregistrements
$select = "SELECT id_remorque,marque,modele,immatriculation,type,date,controle,revision,observation,longueur,largeur,hauteur FROM remorque WHERE controle < '$today'";
$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
$total = mysql_num_rows($result);
 
// si on a récupéré un résultat on l'affiche.
if($total) {
// debut du tableau
echo '<table class="table table-striped" align="center">'."\n";
// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne. 
while($row = mysql_fetch_array($result)) {
echo '<tr>';
echo '<td>'.$row["id_remorque"].'</td>';
echo '<td>'.$row["marque"].'</td>';
echo '<td>'.$row["modele"].'</td>';
echo '<td>'.$row["immatriculation"].'</td>';
echo '<td>'.$row["type"].'</td>';
echo '<td>'.$row["date"].'</td>';
echo '<td>'.$row["controle"].'</td>';
echo '<td>'.$row["revision"].'</td>';
echo '<td>'.$row["observation"].'</td>';
echo '<td>'.$row["longueur"].'</td>';
echo '<td>'.$row["largeur"].'</td>';
echo '<td>'.$row["hauteur"].'</td>';
echo '<td><a href="mod_remorque.php?id_remorque='.$row["id_remorque"].'"><button type="button" class="btn btn-default">Afficher</button></a></td>';
echo '</tr>'."\n";
}
echo '</table>'."\n";
// fin du tableau.
}
else echo 'Pas d\'enregistrements dans cette table...';
 
// on libère le résultat
mysql_free_result($result);
?>