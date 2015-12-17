<?php
// inclusion
include "../fonctions_base.php";
include "../fonctions_annexe.php";
include "../header.php";
?>
	<div class="container">
     <div class="row">
<?php
// Si le formulaire est valide on supprime
if (isset ($_POST['supprimer'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$id_user=$_POST['id_user'];
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	//$sql = 'UPDATE utilisateur SET mail="'.$mail.'", password="'.$password.'", nom="'.$nom.'", prenom="'.$prenom.'", droit="'.$droit.'" WHERE id_user="'.$id_user.'"';
	$sql = 'DELETE FROM utilisateur WHERE id_user="'.$id_user.'"';
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la modif
	echo "<p><h2>L'utilisateur à bien &eacutet&eacute supprim&eacute !</h2></p>";

	// Sinon on demande de valider la suppression
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
		<h2 align=\"center\">/!\ Attention /!\</h2><br>
		<h4 align=\"center\">Etes-vous sur de vouloir supprimer l'enregistrement suivant ?</h4><br>
		<div class=\"col-md-3\"></div>
			<div class=\"col-md-6\" align=\"center\">
		<table class=\"table table-striped\">
        <form name=\"inscription\" method=\"post\" action=\"supp_user.php\">
		<tr>
			<td>Utilisateur : </td>
			<td>$mail</td>
		</tr>
		<tr>
			<td>Mot de passe :	</td>
			<td>$password</td>
		</tr>
		<tr>
			<td>Nom :	</td>
			<td>$nom</td>
		</tr>
		<tr>
			<td>Prenom :	</td>
			<td>$prenom</td>
		</tr>
		<tr>
			<td>Role :	</td>
			<td>";
			if ($droit == "1"){
				echo "Chauffeur";
			}
			if ($droit == "2"){
				echo "Administration";
			}
		echo "
			</td>
		</tr>
			<input type=\"hidden\" name=\"id_user\" value=\"$id_user\">
		<tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-danger\" type=\"submit\" name=\"supprimer\" value=\"Supprimer\"/></td>
		</tr>
        </form>
		</table>";
	}
}
?>
	<div class="page-header">
		<a href="aff_user.php"><button type="button" class="btn btn-default">Retour au Listing</button></a><br><br>
	    <a href="../admin.php"><button type="button" class="btn btn-default">Retour Admin</button></a>
	</div>
		</div>
			</div>
<?php 
include "../footer.php"; 
?>