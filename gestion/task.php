<?php
// inclusion
include "../fonctions_base.php";
include "../fonctions_annexe.php";
include "../header.php";
// Date du jour
$today = date("d-m-Y");

?>
	<div class="container">
     <div align="center" class="row">
		<h2>Saisie des informations de la fiche journalière</h2><br>
			<h4 align="center"><?php echo $today; ?></h4>
				<br>

	<table align="left" class="table table-striped">
		<tr>
			<td>Navire</td>
			<td><input type="text" name="navire"/></td>
		</tr>
	</table> 

<form id="form_frais">
 
<table id="frais">
<thead>
    <tr>
        <th>Expéditeur</th>
        <th>Immatriculation</th>
        <th>Livraison</th>
        <th>Actions</th>
    </tr>
</thead>
     <br>
<tfoot>
    <tr>
        <td align="center" colspan="4"><br><button class="btn btn-primary" type="button" id="ajouter_ligne">Ajouter une ligne</button></td>
    </tr>
</tfoot>
 
<tbody>
</tbody>
</table>
 
<p class="submit">
    <br><button class="btn btn-primary" type="button" id="modifier" disabled="disabled">Modifier</button>
    <button class="btn btn-primary" type="submit" id="valider" class="important">Valider</button>
</p>
</form>
<script src="task.js"></script>

	</div>
</div>
<?php 
include "../footer.php"; 
?>