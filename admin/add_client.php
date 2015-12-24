<?php
// inclusion
include "../fonctions_base.php";
include "../fonctions_annexe.php";
include "../fonctions_affichage.php";
include "../header.php";
?>
	<div class="container">
     <div class="row">
<?php
// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['nom'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$nom=$_POST['nom'];
	$adresse=$_POST['adresse'];
	$cp=$_POST['cp'];
	$ville=$_POST['ville'];
	$siret=$_POST['siret']; 
	$tva=$_POST['tva'];
	$tel=$_POST['tel'];
	$fax=$_POST['fax'];
	$mail=$_POST['mail'];
	$contact=$_POST['contact'];
	$obs=$_POST['obs'];
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'INSERT INTO client VALUES("","'.$nom.'","'.$adresse.'","'.$cp.'","'.$ville.'","'.$siret.'","'.$tva.'","'.$tel.'","'.$fax.'","'.$mail.'","'.$contact.'","'.$obs.'")';
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la creation
	$msg = aff_creer("Le Client");
	echo $msg;
}
	
	// sinon on affiche le formulaire
	else {
		echo "
		<h1 align=\"center\">Ajout d'un Client</h1>
		<div class=\"col-md-3\"></div>
			<div class=\"col-md-6\" align=\"center\">
		<table class=\"table table-striped\">
			<h2>Entrez les donn&eacutees demand&eacutees :</h2>
		<form name=\"inscription\" method=\"post\" action=\"add_client.php\">
		<tr>
			<td>Nom :	</td>
			<td><input type=\"text\" name=\"nom\"/></td>
		</tr>
		<tr>
			<td>Adresse :	</td>
			<td><input type=\"text\" name=\"adresse\"/></td>
		</tr>
		<tr>
			<td>Code Postal :	</td>
			<td><input type=\"text\" name=\"cp\"/></td>
		</tr>
		<tr>
			<td>Ville :	</td>
			<td><input type=\"text\" name=\"ville\"/></td>
		</tr>
		<tr>
			<td>Siret :	</td>
			<td><input type=\"text\" name=\"siret\"/></td>
		</tr>
		<tr>
			<td>NÂ°TVA :	</td>
			<td><input type=\"text\" name=\"tva\"/></td>
		</tr>
		<tr>
			<td>T&eacutel&eacutephone :	</td>
			<td><input type=\"text\" name=\"tel\"/></td>
		</tr>
		<tr>
			<td>Fax :	</td>
			<td><input type=\"text\" name=\"fax\"/></td>
		</tr>
		<tr>
			<td>Mail :	</td>
			<td><input type=\"text\" name=\"mail\"/></td>
		</tr>
		<tr>
			<td>Contact :	</td>
			<td><input type=\"text\" name=\"contact\"/></td>
		</tr>
		<tr>
			<td>Observation :	</td>
			<td><input type=\"text\" name=\"obs\"/></td>
		</tr>
		<tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-success\" type=\"submit\" name=\"valider\" value=\"Valider\"/></td>
		</tr>
        </form>
		</table>";
		}
	
	// on ferme la page
	$ppage = piedpage_formulaire("clients");
	echo $ppage;

	include "../footer.php"; 
?>