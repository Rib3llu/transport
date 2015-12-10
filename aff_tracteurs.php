<html>
<meta charset="utf-8">
<title>Affichage Tracteurs</title>
<body>
        <h1 align="center">Listing des Tracteurs</h1>

<?php
// ajout des fonctions
include "fonctions_base.php";

//On se connecte a la base
connectBase();
	 
// requête SQL qui compte le nombre total d'enregistrement dans la table et qui
//récupère tous les enregistrements
$select = 'SELECT id_tracteur,marque,modele,immatriculation,date,visite,entretien,observation FROM tracteur';
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
echo '<td bgcolor="#669999"><b><u>Date construction</u></b></td>';
echo '<td bgcolor="#669999"><b><u>Date prochain Contrôle Technique</u></b></td>' ;
echo '<td bgcolor="#669999"><b><u>Date prochaine Révision</u></b></td>' ;
echo '<td bgcolor="#669999"><b><u>Observation</u></b></td>' ;
echo '<td bgcolor="#669999"><b><u>Modifier</u></b></td>' ;
echo '<td bgcolor="#669999"><b><u>Supprimer</u></b></td>' ;
echo '</tr>'."\n";
// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne. 
while($row = mysql_fetch_array($result)) {
echo '<tr>';
echo '<td bgcolor="#CCCCCC">'.$row["id_tracteur"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["marque"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["modele"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["immatriculation"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["date"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["visite"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["entretien"].'</td>';
echo '<td bgcolor="#CCCCCC">'.$row["observation"].'</td>';
echo '<td bgcolor="#CCCCCC" align="center"><form method="post" action="mod_tracteur.php"><input type="hidden" name="id_tracteur" value='.$row["id_tracteur"].' /><input type="image" src="img/mod.jpg" width="32" height="32" border="0" alt="modifier" name="mod"></form></td>';
echo '<td bgcolor="#CCCCCC" align="center"><form method="post" action="supp_tracteur.php"><input type="hidden" name="id_tracteur" value='.$row["id_tracteur"].' /><input type="image" src="img/supp.png" width="32" height="32" border="0" alt="supprimer" name="del_img"></form></td>';


echo '</tr>'."\n";
}
echo '</table>'."\n";
// fin du tableau.
}
else echo 'Pas d\'enregistrements dans cette table...';
 
// on libère le résultat
mysql_free_result($result);
 
?>
       <p><div align="center"><a href="add_tracteur.php"><img src="img/plus.jpg" width="32" height="32" border="0"></a></div></p>
	   <p><div align="center"><h3><a href="index.php"><< Accueil <<</a></h3></div></p>

</body>
</html>
