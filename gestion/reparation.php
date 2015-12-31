<?php
// inclusion
include "../header.php";
?>
	<div class="container">
     <div class="row">
<?php
// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['date'])){
			
	// On recupere les donnees
	$id_chauffeur=$_POST['id_chauffeur'];
	$id_tracteur=$_POST['id_tracteur'];
	$id_remorque=$_POST['id_remorque'];
	$description=$_POST['description'];
	$date=$_POST['date'];
	$prix=$_POST['prix'];
	$adverse=$_POST['adverse'];
	$nature=$_POST['nature'];
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'INSERT INTO accident VALUES("","'.$id_tracteur.'","'.$id_remorque.'","'.$description.'","'.$date.'","'.$prix.'","'.$id_chauffeur.'","'.$adverse.'","'.$nature.'")';
	
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la modif
	
	echo "<br><div class=\"alert alert-success\" role=\"alert\">
        <h3>La r&eacuteparation à bien &eacutet&eacute enregistr&eacutee...!</strong></h3>
      </div>";

	// Sinon on affiche le formulaire
}
else{

		//On se connecte
		connectBase();
		
		// On recupere les chauffeurs, tracteurs et remorques
		$select1 = 'SELECT id_chauffeur, nom, prenom FROM chauffeur'; 
		$result1 = mysql_query($select1) or die ('Erreur : '.mysql_error() );
		//$total1 = mysql_num_rows($result1);
		$select2 = 'SELECT id_tracteur,immatriculation FROM tracteur'; 
		$result2 = mysql_query($select2) or die ('Erreur : '.mysql_error() );
		//$total1 = mysql_num_rows($result1);
		// 
		$select3 = 'SELECT id_remorque,immatriculation FROM remorque'; 
		$result3 = mysql_query($select3) or die ('Erreur : '.mysql_error() );
		//$total2 = mysql_num_rows($result2);
		
		// On affiche le formulaire

	echo '
        <h1 align="center">Enregistrement d\'une Réparation</h1><br>
		<div class="col-md-3"></div>
			<div class="col-md-6" align="center">
		<table class="table table-striped">
        <form name="inscription" method="post" action="reparation.php">
		<tr>
			<td>Chauffeur : </td>
			<td>
				<select name="id_chauffeur">
					<option value=""></option>
					';
			while($row = mysql_fetch_array($result1)) 
			{
					echo '<option value="'.$row["id_chauffeur"].'">'.$row["nom"].' - '.$row["prenom"].'</option>';
			}
	echo '	</select>
			</td>
		</tr>
		<tr>
			<td>Tracteur : </td>
			<td>
				<select name="id_tracteur">
					<option value=""></option>
					';
			while($row2 = mysql_fetch_array($result2)) 
			{
					echo '<option value="'.$row2["id_tracteur"].'">'.$row2['immatriculation'].'</option>';
			}
	echo '	</select>
			</td>
		</tr>
		<tr>
			<td>Remorque : </td>
			<td>
				<select name="id_remorque">
					<option value=""></option>
					';
			while($row3 = mysql_fetch_array($result3)) 
			{
					echo '<option value="'.$row3["id_remorque"].'">'.$row3['immatriculation'].'</option>';
			}
	echo "	</select>
			</td>
		</tr>
		<tr>
			<td>Date :	</td>
			<td><input type=\"text\" id=\"datepicker\" name=\"date\"/></td>
		</tr>
		<tr>
			<td>Description de la r&eacuteparation :	</td>
			<td><input type=\"text\" name=\"description\"/></td>
		</tr>
		<tr>
			<td>Coût :	</td>
			<td><input type=\"text\" name=\"prix\"></td>
		</tr>
		<tr>
			<td>Constat : </td>
			<td><input type=\"text\" name=\"adverse\"/></td>
		</tr>
		<tr>
			<td>Nature de la reparation :	</td>
			<td><select name=\"nature\">
							<option value=\"panne\">Panne</option>
							<option value=\"accident\">Accident</option></select>
			</td>
		</tr>
		<tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-success\" type=\"submit\" name=\"valider\" value=\"Enregistrer\"/></td>
		</tr>
			</form>
		</table>";
	// on ferme la connexion
	mysql_close();
}
?>
	<div class="page-header">
	    <a href="../gestion.php"><button type="button" class="btn btn-default">Retour Gestion</button></a>
	</div>
		</div>
			</div>
<?php 
include "../footer.php"; 
?>