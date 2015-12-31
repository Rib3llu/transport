<?php
// inclusion
include "../header.php";
?>
        <h1 align="center">Listing des Produits</h1>
<?php
//On se connecte a la base
connectBase();
	 
// requête SQL qui compte le nombre total d'enregistrement dans la table et qui
//récupère tous les enregistrements
$select = 'SELECT id_produit,detail,description,prix_revient,prix_vente FROM produits';
$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
$total = mysql_num_rows($result);
 
// si on a récupéré un résultat on l'affiche.
if($total) {
// debut du tableau
echo '<div class="col-md-1"></div><div class="col-md-10" align="center"><table class="table table-striped">'."\n";
// première ligne on affiche les titres prénom et surnom dans 2 colonnes
echo '<tr>';
echo '<td><b><u>Identifiant</u></b></td>';
echo '<td><b><u>Nom du Produit</u></b></td>';
echo '<td><b><u>Description</u></b></td>';
echo '<td><b><u>Prix de revient</u></b></td>';
echo '<td><b><u>Prix de Vente</u></b></td>';
echo '<td><b><u>Modifier</u></b></td>' ;
echo '<td><b><u>Supprimer</u></b></td>' ;
echo '</tr>'."\n";
// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne. 
while($row = mysql_fetch_array($result)) {
echo '<tr>';
echo '<td>'.$row["id_produit"].'</td>';
echo '<td>'.$row["detail"].'</td>';
echo '<td>'.$row["description"].'</td>';
echo '<td>'.$row["prix_revient"].'</td>';
echo '<td>'.$row["prix_vente"].'</td>';
echo '<td align="center"><form method="post" action="mod_produit.php"><input type="hidden" name="id_produit" value='.$row["id_produit"].' /><input type="image" src="../img/mod.jpg" width="32" height="32" border="0" alt="modifier" name="mod"></form></td>';
echo '<td align="center"><form method="post" action="supp_produit.php"><input type="hidden" name="id_produit" value='.$row["id_produit"].' /><input type="image" src="../img/supp.png" width="32" height="32" border="0" alt="supprimer" name="del_img"></form></td>';
echo '</tr>'."\n";
}
echo '</table>'."\n";
// fin du tableau.
}
else echo 'Pas d\'enregistrements dans cette table...';
 
// on libère le résultat
mysql_free_result($result);
 
// On ferme la page 
$piedpage = piedpage_tableau("produit");
echo $piedpage;
include "../footer.php"; 
?>