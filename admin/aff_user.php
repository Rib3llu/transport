<?php
// inclusion
include "../fonctions_base.php";
include "../fonctions_annexe.php";
include "../fonctions_affichage.php";
include "../header.php";
?>
        <br><h1 align="center">Listing des utilisateurs</h1><br>
<?php
//On se connecte a la base
connectBase();
	 
// requête SQL qui compte le nombre total d'enregistrement dans la table et qui
//récupère tous les enregistrements
$select = 'SELECT id_user,mail,password,nom,prenom,droit,logo FROM utilisateur';
$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
$total = mysql_num_rows($result);
 
// si on a récupéré un résultat on l'affiche.
if($total) {
// debut du tableau
echo '<div class="col-md-1"></div><div class="col-md-10" align="center"><table class="table table-striped">'."\n";
// première ligne on affiche les titres prénom et surnom dans 2 colonnes
echo '<tr>';
echo '<td><b><u>Identifiant</u></b></td>';
echo '<td><b><u>Mail</u></b></td>';
echo '<td><b><u>Password</u></b></td>';
echo '<td><b><u>Nom</u></b></td>';
echo '<td><b><u>Pr&eacutenom</u></b></td>';
echo '<td><b><u>Droit</u></b></td>' ;
echo '<td><b><u>Logo</u></b></td>' ;
echo '<td><b><u>Modifier</u></b></td>' ;
echo '<td><b><u>Supprimer</u></b></td>' ;
echo '</tr>'."\n";
// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne. 
while($row = mysql_fetch_array($result)) {
echo '<tr>';
echo '<td>'.$row["id_user"].'</td>';
echo '<td>'.$row["mail"].'</td>';
echo '<td>'.$row["password"].'</td>';
echo '<td>'.$row["nom"].'</td>';
echo '<td>'.$row["prenom"].'</td>';
echo '<td>';
if ($row["droit"]== '1') { 
	echo 'Utilisateur';
}
if ($row["droit"]== '2') { 
	echo 'Administrateur';
}
echo '</td>';
echo '<td>'.$row["logo"].'</td>';
echo '<td align="center"><form method="post" action="mod_user.php"><input type="hidden" name="id_user" value='.$row["id_user"].' /><input type="image" src="../img/mod.jpg" width="32" height="32" border="0" alt="modifier" name="mod"></form></td>';
echo '<td align="center"><form method="post" action="supp_user.php"><input type="hidden" name="id_user" value='.$row["id_user"].' /><input type="image" src="../img/supp.png" width="32" height="32" border="0" alt="supprimer" name="del_img"></form></td>';

echo '</tr>'."\n";
}
echo '</table>'."\n";
// fin du tableau.
}
else echo 'Pas d\'enregistrements dans cette table...';
 
// on libère le résultat
mysql_free_result($result);
 
// On ferme la page 
$piedpage = piedpage_tableau("user");
echo $piedpage;
include "../footer.php"; 
?>