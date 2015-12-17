<?php
// inclusion
include "../fonctions_base.php";
include "../fonctions_annexe.php";
include "../header.php";
?>
	<div class="container">
     <div class="row">
		<h2>Révision périodique du Matériel</h2><br>
		<h4>
			<div class="alert alert-danger" role="alert">
				<strong>Attention !</strong> Détail des révisions à prévoir pour les tracteurs :
			</div>
		</h4>
<?php
//date du jour
$today = date("Y-m-d");

//On se connecte a la base
connectBase();
	 
// requête SQL qui compte le nombre total d'enregistrement dans la table et qui
//récupère tous les enregistrements
$select = "SELECT id_tracteur,marque,modele,immatriculation,date,visite,entretien,observation FROM tracteur WHERE entretien < '$today'";
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
else echo 'Pas de révision prévu...<br>';
 
// on libère le résultat
mysql_free_result($result);

?>
<br>
		<h4>
			<div class="alert alert-danger" role="alert">
				<strong>Attention !</strong> Détail des révisions à prévoir pour les remorques :
			</div>
		</h4>
<?php
//On se connecte a la base
connectBase();
	 
// requête SQL qui compte le nombre total d'enregistrement dans la table et qui
//récupère tous les enregistrements
$select = "SELECT id_remorque,marque,modele,immatriculation,type,date,controle,revision,observation,longueur,largeur,hauteur FROM remorque WHERE revision < '$today'";
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
else echo 'Pas de révision prévu...<br>';
 
// on libère le résultat
mysql_free_result($result);
?>
	</div>
</div>
<?php 
include "../footer.php"; 
?>