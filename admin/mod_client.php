<?php
// inclusion
include "../fonctions_base.php";
include "../fonctions_annexe.php";
include "../header.php";
?>
	<div class="container">
     <div class="row">
<?php
// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['nom'])){
	//On récupère les valeurs entrées par l'utilisateur :
    $id_client=$_POST['id_client'];
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
	$observation=$_POST['observation'];
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'UPDATE client SET nom="'.$nom.'", adresse="'.$adresse.'", cp="'.$cp.'", ville="'.$ville.'", siret="'.$siret.'", tva="'.$tva.'", tel="'.$tel.'", fax="'.$fax.'", mail="'.$mail.'", observation="'.$observation.'", contact="'.$contact.'" WHERE id_client="'.$id_client.'"'; 
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
		
	// on valide la creation
	echo "<p><h2>Le client a bien &eacutet&eacute modifi&eacute</h2></p>";
}
	
	// sinon on affiche le formulaire avec les donnees pre-remplis
	else {
		
		//On se connecte
		connectBase();
		
		// On recupere ID 
		$id_client = $_POST['id_client'];
		
		// On recupere la ligne
		$select = 'SELECT id_client,nom,adresse,cp,ville,siret,tva,tel,fax,mail,contact,observation FROM client WHERE id_client = '. "$id_client" .' '; 
	 
		$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
		$total = mysql_num_rows($result);
	 
	// On affiche le formulaire pre-rempli
	while($row = mysql_fetch_array($result)) {
		
		$nom = $row["nom"];
		$add = $row['adresse'];
		$cp = $row["cp"];
		$ville = $row["ville"];
		$siret = $row["siret"];
		$tva = $row["tva"];
		$tel = $row["tel"];
		$fax = $row["fax"];
		$mail = $row["mail"];
		$contact = $row["contact"];
		$obs = $row["observation"];
		$id_client = $row["id_client"];
		
		echo "
		<h1 align=\"center\">Modification d'un Client</h1><br>
		<div class=\"col-md-3\"></div>
			<div class=\"col-md-6\" align=\"center\">
		<table class=\"table table-striped\">
			<form name=\"inscription\" method=\"post\" action=\"mod_client.php\">
		<tr>
			<td>Nom :	</td>
			<td><input type=\"text\" name=\"nom\" value=\"$nom\"></td>
		</tr>
		<tr>
			<td>Adresse :	</td>
			<td><input type=\"text\" name=\"adresse\" value=\"$add\"></td>
		</tr>
		<tr>
			<td>Code Postal :	</td>
			<td><input type=\"text\" name=\"cp\" value=\"$cp\"></td>
		</tr>
		<tr>
			<td>Ville :	</td>
			<td><input type=\"text\" name=\"ville\" value=\"$ville\"></td>
		</tr>
		<tr>
			<td>Siret :	</td>
			<td><input type=\"text\" name=\"siret\" value=\"$siret\"></td>
		</tr>
		<tr>
			<td>N. TVA :	</td>
			<td><input type=\"text\" name=\"tva\" value=\"$tva\"></td>
		</tr>
		<tr>
			<td>T&eacutel&eacutephone :	</td>
			<td><input type=\"text\" name=\"tel\" value=\"$tel\"></td>
		</tr>
		<tr>
			<td>Fax :	</td>
			<td><input type=\"text\" name=\"fax\" value=\"$fax\"></td>
		</tr>
		<tr>
			<td>Mail :	</td>
			<td><input type=\"text\" name=\"mail\" value=\"$mail\"></td>
		</tr>
		<tr>
			<td>Contact :	</td>
			<td><input type=\"text\" name=\"contact\" value=\"$contact\"></td>
		</tr>
		<tr>
			<td>Observation :	</td>
			<td><input type=\"text\" name=\"observation\" value=\"$obs\"></td>
		</tr>
		<input type=\"hidden\" name=\"id_client\" value=\"$id_client\">
		<tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-success\" type=\"submit\" name=\"valider\" value=\"Valider\"/></td>
		</tr>
        </form>
		</table>";
	}
		// on ferme la connexion
	mysql_close();
	}
?>
	<div class="page-header">
		<a href="aff_clients.php"><button type="button" class="btn btn-default">Retour au Listing</button></a><br><br>
	    <a href="../admin.php"><button type="button" class="btn btn-default">Retour Admin</button></a>
	</div>
		</div>
			</div>
<?php 
include "../footer.php"; 
?>