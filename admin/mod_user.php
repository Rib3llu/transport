<?php
// inclusion
include "../header.php";
?>
	<div class="container">
     <div class="row">
<?php
// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['mail'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$id_user=$_POST['id_user'];
	$mail=$_POST['mail'];
	$password=$_POST['password'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$droit=$_POST['droit']; 
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'UPDATE utilisateur SET mail="'.$mail.'", password="'.$password.'", nom="'.$nom.'", prenom="'.$prenom.'", droit="'.$droit.'" WHERE id_user="'.$id_user.'"';
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on affiche la reussite de la modif
	$msg = aff_modifier("Le Compte");
	echo $msg;

	// Sinon on affiche le formulaire
}
else{
		//On se connecte
		connectBase();
		
		// On recupere ID 
		$id_user = $_POST['id_user'];
		
		// On recupere la ligne
		$select = 'SELECT id_user,mail,password,nom,prenom,droit FROM utilisateur WHERE id_user = '. "$id_user" .' '; 
	 
		$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
		$total = mysql_num_rows($result);
	 
	// On affiche le formulaire pre-rempli
	while($row = mysql_fetch_array($result)) {
		
	$id_user=$row["id_user"];
	$mail=$row['mail'];
	$password=$row['password'];
	$nom=$row['nom'];
	$prenom=$row['prenom'];
	$droit=$row['droit']; 


		echo "
		<h1 align=\"center\">Modification d'un Chauffeur</h1>
		<div class=\"col-md-3\"></div>
			<div class=\"col-md-6\" align=\"center\">
		<table class=\"table table-striped\">
			<h2>Entrez les donn&eacutees demand&eacutees :</h2>
        <form name=\"inscription\" method=\"post\" action=\"mod_user.php\">
		<tr>
			<td>Entrez le mail utilisateur : </td>
			<td><input type=\"text\" name=\"mail\" value=\"$mail\"/></td>
		</tr>
		<tr>
			<td>Mot de passe :	</td>
			<td><input type=\"text\" name=\"password\" value=\"$password\"/></td>
		</tr>
		<tr>
			<td>Nom :	</td>
			<td><input type=\"text\" name=\"nom\" value=\"$nom\"/></td>
		</tr>
		<tr>
			<td>Prenom :	</td>
			<td><input type=\"text\" name=\"prenom\" value=\"$prenom\"/></td>
		</tr>
		<tr>
			<td>Role :	</td>
			<td>
				<select name=\"droit\">";
			if ($droit=='1'){
				echo "
				<option value=\"1\">Chauffeur</option>
				<option value=\"2\">Administration</option>
				";
			}
			if ($droit=='2'){
				echo "
				<option value=\"2\">Administration</option>
				<option value=\"1\">Chauffeur</option>
				";
			}
		echo "				
				</select>
			</td>
		</tr>
			<input type=\"hidden\" name=\"id_user\" value=\"$id_user\">
		<tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-success\" type=\"submit\" name=\"valider\" value=\"Valider\"/></td>
		</tr>
        </form>
		</table>";
	}
}
	// on ferme la page
	$ppage = piedpage_formulaire("user");
	echo $ppage;

	include "../footer.php"; 
?>