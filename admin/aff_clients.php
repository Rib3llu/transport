<?php
// inclusion
include "../fonctions_base.php";
include "../fonctions_annexe.php";
include "../fonctions_affichage.php";
include "../header.php";
?>
        <br><h1 align="center">Listing des Clients</h1><br>
<?php
//On se connecte a la base
connectBase();
	 
// requête SQL qui compte le nombre total d'enregistrement dans la table et qui
//récupère tous les enregistrements
$select = 'SELECT id_client,nom,adresse,cp,ville,siret,tva,tel,fax,mail,contact,observation FROM client';
$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
$total = mysql_num_rows($result);
 
// si on a récupéré un résultat on l'affiche.
if($total) {
// debut du tableau
echo '<div class="col-md-12" align="center"><table class="table table-striped">'."\n";
// première ligne on affiche les titres prénom et surnom dans 2 colonnes
echo '<tr>';
echo '<td><b><u>Identifiant</u></b></td>';
echo '<td><b><u>Nom</u></b></td>';
echo '<td><b><u>Adresse</u></b></td>';
echo '<td><b><u>Code Postal</u></b></td>';
echo '<td><b><u>Ville</u></b></td>';
echo '<td><b><u>N. de SIRET</u></b></td>' ;
echo '<td><b><u>TVA</u></b></td>' ;
echo '<td><b><u>T&eacutel&eacutephone</u></b></td>' ;
echo '<td><b><u>Fax</u></b></td>' ;
echo '<td><b><u>Adresse Mail</u></b></td>' ;
echo '<td><b><u>Contact</u></b></td>' ;
echo '<td><b><u>Observation</u></b></td>' ;
echo '<td><b><u>Modifier</u></b></td>' ;
echo '<td><b><u>Supprimer</u></b></td>' ;
echo '</tr>'."\n";
// lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne. 
while($row = mysql_fetch_array($result)) {
echo '<tr>';
echo '<td>'.$row["id_client"].'</td>';
echo '<td>'.$row["nom"].'</td>';
echo '<td>'.$row["adresse"].'</td>';
echo '<td>'.$row["cp"].'</td>';
echo '<td>'.$row["ville"].'</td>';
echo '<td>'.$row["siret"].'</td>';
echo '<td>'.$row["tva"].'</td>';
echo '<td>'.$row["tel"].'</td>';
echo '<td>'.$row["fax"].'</td>';
echo '<td>'.$row["mail"].'</td>';
echo '<td>'.$row["contact"].'</td>';
echo '<td>'.$row["observation"].'</td>';
echo '<td align="center"><form method="post" action="mod_client.php"><input type="hidden" name="id_client" value='.$row["id_client"].' /><input type="image" src="../img/mod.jpg" width="32" height="32" border="0" alt="modifier" name="mod"></form></td>';
echo '<td align="center"><form method="post" action="supp_client.php"><input type="hidden" name="id_client" value='.$row["id_client"].' /><input type="image" src="../img/supp.png" width="32" height="32" border="0" alt="supprimer" name="del_img"></form></td>';

echo '</tr>'."\n";
}
echo '</table>'."\n";
// fin du tableau.
}
else echo 'Pas d\'enregistrements dans cette table...';
 
// on libère le résultat
mysql_free_result($result);
 
// On ferme la page 
$piedpage = piedpage_tableau("client");
echo $piedpage;
include "../footer.php"; 
?>