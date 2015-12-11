<?php
// inclusion
include "fonctions_base.php";
include "fonctions_annexe.php";
include "header.php";
?>
	<div class="container">
     <div class="row">
<?php
// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['mail'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$mail=$_POST['mail'];
	$password=$_POST['password'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$droit=$_POST['droit']; 
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'INSERT INTO utilisateur VALUES("","'.$mail.'","'.$password.'","'.$nom.'","'.$prenom.'","'.$droit.'","")';
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la creation
	echo "<p><h2>L'utilisateur à bien &eacutet&eacute cr&eacute&eacute</h2></p>";

	// Sinon on affiche le formulaire
}
else{
		echo "
		<br><h1 align=\"center\">Ajout d'un Utilisateur</h1>
		<div class=\"col-md-3\"></div>
		<div class=\"col-md-6\" align=\"center\"><table class=\"table table-striped\">
		<br><h2>Entrez les données demandées :</h2><br>
			<form name=\"inscription\" method=\"post\" action=\"add_user.php\">
				<tr>
					<td>Entrez le mail utilisateur : </td>
					<td><input type=\"text\" name=\"mail\"/></td>
				</tr>
				<tr>
					<td>Mot de passe :	</td>
					<td><input type=\"text\" name=\"password\"/></td>
				</tr>
				<tr>
					<td>Nom : </td>
					<td><input type=\"text\" name=\"nom\"/></td>
				</tr>
				<tr>
					<td>Prenom : </td>
					<td><input type=\"text\" name=\"prenom\"/></td>
				</tr>
				<tr>
					<td>Role :	</td>
					<td><select name=\"droit\">
							<option value=\"1\">Chauffeur</option>
							<option value=\"2\">Administration</option></select>
					</td>
				</tr>
				<tr>
					<td align=\"right\"><input class=\"btn btn-success\" type=\"submit\" name=\"valider\" value=\"Valider\"/></td>
				</tr>
				</form>
				</table>
		";
	}
	
?>
	<div class="page-header">
		<a href="aff_user.php"><button type="button" class="btn btn-default">Retour au Listing</button></a><br><br>
	    <a href="admin.php"><button type="button" class="btn btn-default">Retour Admin</button></a>
	</div>
		</div>
			</div>
<?php 
include "footer.php"; 
?>