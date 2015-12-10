<html>
<title>Affichage Produits</title>
<body>
        <h1 align="center">Listing des Produits</h1>

<?php
// ajout des fonctions
include "fonctions_base.php";

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
echo '<table bgcolor="#FFFFFF" align="center">'."\n";
// première ligne on affiche les titres prénom et surnom dans 2 colonnes
echo '<tr>';
echo '<td bgcolor="#669999"><b><u>Identifiant</u></b></td>';
echo '<td bgcolor="#669999"><b><u>Nom du Produit</u></b></td>';
echo '<td bgcolor="#669999"><b><u>Description</u></b></td>';
echo '<td bgcolor="#669999"><b><u>Prix de revient</u></b></td>';
echo '<td bgcolor="#669999"><b><u>Prix de Vente</u></b></td>';
echo '<td bgcolor="#669999"><b><u>Modifier</u></b></td>' ;
echo '<td bgcolor="#669999"><b><u>Supprimer</u></b></td>' ;
echo '</tr>'."\n";
// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne. 
while($row = mysql_fetch_array($result)) {
echo '<tr>';
echo '<td bgcolor="#CCCCCC">'.$row["id_produit"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["detail"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["description"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["prix_revient"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["prix_vente"].'</td>';
echo '<td bgcolor="#CCCCCC" align="center"><form method="post" action="mod_produit.php"><input type="hidden" name="id_produit" value='.$row["id_produit"].' /><input type="image" src="img/mod.jpg" width="32" height="32" border="0" alt="modifier" name="mod"></form></td>';
echo '<td bgcolor="#CCCCCC" align="center"><form method="post" action="supp_produit.php"><input type="hidden" name="id_produit" value='.$row["id_produit"].' /><input type="image" src="img/supp.png" width="32" height="32" border="0" alt="supprimer" name="del_img"></form></td>';
echo '</tr>'."\n";
}
echo '</table>'."\n";
// fin du tableau.
}
else echo 'Pas d\'enregistrements dans cette table...';
 
// on libère le résultat
mysql_free_result($result);
 
?>
       <p><div align="center"><a href="add_produit.php"><img src="img/plus.jpg" width="32" height="32" border="0"></a></div></p>
	   <p><div align="center"><h3><a href="index.php"><< Accueil <<</a></h3></div></p>

</body>
</html>
