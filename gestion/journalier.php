<?php
// inclusion
include "../fonctions_base.php";
include "../fonctions_annexe.php";
include "../header.php";
?>
	<div class="container">
     <div class="row">
		<h2>Saisie des informations de la fiche journalière</h2><br>
<?php
// Date du jour
$today = date("d-m-Y");
// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['date_jour'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$id_tracteur=$_POST['id_tracteur'];
	$id_remorque=$_POST['id_remorque'];
	$id_chauffeur=$_POST['id_chauffeur'];
	$client1=$_POST['client2'];
	$client2=$_POST['client2'];
	$date_jour=$_POST['date_jour'];
	$date_valide=$_POST['date_valide'];
	$poid=$_POST['poid'];
	$remorque=$_POST['remorque'];
	$navire=$_POST['largeur'];
	$observation=$_POST['observation'];

	$date_jour = date("Y-m-d", strtotime($date_jour));
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'INSERT INTO journalier VALUES("","'.$id_tracteur.'","'.$id_remorque.'","'.$id_chauffeur.'","'.$client1.'","'.$client2.'","'.$date_jour.'","'.$date_valide.'","'.$poid.'","'.$remorque.'","'.$navire.'","'.$observation.'")';
	
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la creation
	echo "<p><h2>La fiche à bien &eacutet&eacute cr&eacute&eacute</h2></p>";
}

// Sinon on affiche le formulaire
else {
	echo "				
		<div align=\"center\">
				<form name=\"inscription\" method=\"post\" action=\"journalier.php\">
		<h4>Tâches chauffeurs pour le <b>$today</b></h4>
	<br>
	<table align=\"left\" class=\"table table-striped\">
		<tr>
			<td>Navire</td>
			<td><input type=\"text\" name=\"navire\"/></td>
		</tr>
	</table>
	<br>
	<table class=\"table table-striped\">
		<tr>
			<td>Expéditeur</td>
			<td>Immatriculation</td>
			<td>Livraison</td>
			<td>Chauffeur</td>
			<td>Poids</td>
			<td>Observation</td>
			<td>Date livraison prévu</td>
		</tr>
		<tr>
			<td><input type=\"text\" name=\"client1\"/></td>
			<td><input type=\"text\" name=\"immatriculation\"/></td>
			<td><input type=\"text\" name=\"client2\"/></td>
			<td><input type=\"text\" name=\"chauffeur\"/></td>
			<td><input type=\"text\" name=\"poids\"/></td>
			<td><input type=\"textarea\" name=\"observation\"/></td>
			<td><input type=\"text\" id=\"datepicker\" name=\"date_prevu\"/></td>
		</tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-success\" type=\"submit\" name=\"valider\" value=\"Valider\"/></td>
        </form>
		</table>
	";
}
?>
<script>
function create_champ(i) {
 
var i2 = i + 1;
 
document.getElementById('leschamps_'+i).innerHTML = '<input type="input" name="name_'+i+'"></span>';
document.getElementById('leschamps_'+i).innerHTML += (i <=40 ) ? '<br /><span id="leschamps_'+i2+'"><a href="javascript:create_champ('+i2+')">Ajouter un champs</a></span>' : '';
 
 
}
</script>
 
<form action="" method="POST">
<fieldset><legend>Formulaire de saisie</legend>
<input type="input" name="name_1" /><br />
<span id="leschamps_2"><a href="javascript:create_champ(2)">Ajouter un champs</a>
</fieldset>
<input type="submit" value="Cr&eacute;er">
<?php
var_dump($_POST);
?>
	</div>
</div>
<?php 
include "../footer.php"; 
?>