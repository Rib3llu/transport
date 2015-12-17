<?php
// inclusion
include "../fonctions_base.php";
include "../fonctions_annexe.php";
include "../header.php";
?>
        <br><h1 align="center">Listing des Réparations</h1><br>
<?php
//On se connecte a la base
connectBase();
	 
// requête SQL qui compte le nombre total d'enregistrement dans la table et qui
//récupère tous les enregistrements
$select = 'SELECT * FROM accident';
$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
$total = mysql_num_rows($result);
 
// si on a récupéré un résultat on l'affiche.
if($total) {
// debut du tableau
echo '<div class="col-md-12" align="center"><table class="table table-striped">'."\n";
// première ligne on affiche les titres prénom et surnom dans 2 colonnes
echo '<tr>';
echo '<td><b><u>Identifiant</u></b></td>';
echo '<td><b><u>Chauffeur</u></b></td>';
echo '<td><b><u>Tracteur</u></b></td>';
echo '<td><b><u>Remorque</u></b></td>';
echo '<td><b><u>Description</u></b></td>';
echo '<td><b><u>Date</u></b></td>';
echo '<td><b><u>Montant</u></b></td>' ;
echo '<td><b><u>Si constat</u></b></td>' ;
echo '<td><b><u>Type</u></b></td>' ;
echo '<td><b><u>Modifier</u></b></td>' ;
echo '<td><b><u>Supprimer</u></b></td>' ;
echo '</tr>'."\n";
// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne. 
while($row = mysql_fetch_array($result)) {
echo '<tr>';
echo '<td>'.$row["id_accident"].'</td>';

// recuperation des noms, immat,...
if ($row["id_chauffeur"] != '0')
{
	$chauffeur = 'SELECT nom,prenom FROM chauffeur WHERE id_chauffeur = '.$row["id_chauffeur"].'';
    $result_chauffeur = mysql_query($chauffeur) or die ('Erreur : '.mysql_error() );
	while($row2 = mysql_fetch_array($result_chauffeur)) 
	{
	echo '<td>'.$row2["nom"].' - '.$row2["prenom"].'</td>';
	}

}
else{
	echo '<td></td>';
}
if ($row["id_tracteur"] != '0')
{
	$tracteur = 'SELECT immatriculation FROM tracteur WHERE id_tracteur = '.$row["id_tracteur"].'';
    $result_tracteur = mysql_query($tracteur) or die ('Erreur : '.mysql_error() );
	while($row3 = mysql_fetch_array($result_tracteur)) 
	{
	echo '<td>'.$row3["immatriculation"].'</td>';
	}

}
else{
	echo '<td></td>';
}
if ($row["id_remorque"] != '0')
{
	$remorque = 'SELECT immatriculation FROM remorque WHERE id_remorque = '.$row["id_remorque"].'';
    $result_remorque = mysql_query($remorque) or die ('Erreur : '.mysql_error() );
	while($row3 = mysql_fetch_array($result_remorque)) 
	{
	echo '<td>'.$row3["immatriculation"].'</td>';
	}

}
else{
	echo '<td></td>';
}
echo '<td>'.$row["description"].'</td>';
echo '<td>'.$row["date"].'</td>';
echo '<td>'.$row["prix"].' €</td>';
echo '<td>'.$row["adverse"].'</td>';
echo '<td>'.$row["nature"].'</td>';
echo '<td align="center"><form method="post" action="mod_reparation.php"><input type="hidden" name="id_accident" value='.$row["id_accident"].' /><input type="image" src="../img/mod.jpg" width="32" height="32" border="0" alt="modifier" name="mod"></form></td>';
echo '<td align="center"><form method="post" action="supp_reparation.php"><input type="hidden" name="id_accident" value='.$row["id_accident"].' /><input type="image" src="../img/supp.png" width="32" height="32" border="0" alt="supprimer" name="del_img"></form></td>';
echo '</tr>'."\n";
}
echo '</table>'."\n";
// fin du tableau.
}
else echo 'Pas d\'enregistrements dans cette table...';
 
// on libère le résultat
mysql_free_result($result);
 
?>
       <p><div align="center"><a href="reparation.php"><img src="../img/plus.jpg" width="32" height="32" border="0"></a></div></p>
	   <div class="page-header"><a href="../gestion.php"><button type="button" class="btn btn-primary">Retour</button></a></div>
	   </div>
<?php 
include "../footer.php"; 
?>