<?php
// inclusion
include "../fonctions_base.php";
include "../fonctions_annexe.php";
include "../header.php";
?>
        <br><h1 align="center">Listing des Remorques</h1><br>
<?php
//On se connecte a la base
connectBase();
	 
// requête SQL qui compte le nombre total d'enregistrement dans la table et qui
//récupère tous les enregistrements
$select = 'SELECT id_remorque,marque,modele,immatriculation,type,date,controle,revision,observation,longueur,largeur,hauteur FROM remorque';
$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
$total = mysql_num_rows($result);
 
// si on a récupéré un résultat on l'affiche.
if($total) {
// debut du tableau
echo '<div class="col-md-12" align="center"><table class="table table-striped">'."\n";
// première ligne on affiche les titres prénom et surnom dans 2 colonnes
echo '<tr>';
echo '<td><b><u>Identifiant</u></b></td>';
echo '<td><b><u>Marque</u></b></td>';
echo '<td><b><u>Modèle</u></b></td>';
echo '<td><b><u>Immatriculation</u></b></td>';
echo '<td><b><u>Type</u></b></td>';
echo '<td><b><u>Date Construction</u></b></td>';
echo '<td><b><u>Date prochain Controle Technique</u></b></td>' ;
echo '<td><b><u>Date prochaine Révision</u></b></td>' ;
echo '<td><b><u>Observation</u></b></td>' ;
echo '<td><b><u>Longueur</u></b></td>' ;
echo '<td><b><u>Largeur</u></b></td>' ;
echo '<td><b><u>Hauteur</u></b></td>' ;
echo '<td><b><u>Modifier</u></b></td>' ;
echo '<td><b><u>Supprimer</u></b></td>' ;
echo '</tr>'."\n";
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
echo '<td align="center"><form method="post" action="mod_remorque.php"><input type="hidden" name="id_remorque" value='.$row["id_remorque"].' /><input type="image" src="../img/mod.jpg" width="32" height="32" border="0" alt="modifier" name="mod"></form></td>';
echo '<td align="center"><form method="post" action="supp_remorque.php"><input type="hidden" name="id_remorque" value='.$row["id_remorque"].' /><input type="image" src="../img/supp.png" width="32" height="32" border="0" alt="supprimer" name="del_img"></form></td>';
echo '</tr>'."\n";
}
echo '</table>'."\n";
// fin du tableau.
}
else echo 'Pas d\'enregistrements dans cette table...';
 
// on libère le résultat
mysql_free_result($result);
 
?>
       <p><div align="center"><a href="add_remorque.php"><img src="../img/plus.jpg" width="32" height="32" border="0"></a></div></p>
	   <div class="page-header"><a href="../admin.php"><button type="button" class="btn btn-primary">Retour</button></a></div>
	   </div>
<?php 
include "../footer.php"; 
?>