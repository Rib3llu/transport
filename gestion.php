<?php
// inclusion
include "fonctions_base.php";
include "fonctions_annexe.php";
include "header.php";
?>
	<div class="container">
     <div class="row">
		<h2>Gestion du Parc</h2>
			<li><a href="gestion/ct.php">Passer un véhicule au contrôle</a><br>
			<li><a href="gestion/revision.php">Passer un véhicule à la révision</a><br>
			<li><a href="gestion/reparation.php">Réparer un véhicule</a><br>
			<li><a href="gestion/hist_controle.php">Voir l'historique des contrôles</a><br>
			<li><a href="gestion/hist_revision.php">Voir l'historique des révisions</a><br>
			<li><a href="gestion/hist_reparation.php">Voir l'historique des réparations</a><br>
			<li><a href="gestion/hist_entretien.php">Calculer le coût d'un véhicule</a><br>
		<h2>Gestion du Travail</h2>
			<li><a href="gestion/task.php">Générer la fiche de travail journalière</a><br>
			<li><a href="gestion/hist_livraison.php">Voir l'historique des tâches</a><br>
			<li><a href="gestion/cmr.php">Créer une lettre de voiture</a><br>
			<li><a href="gestion/voyage.php">Enregistrer un voyage</a><br>
		<h2>Gestion Financière</h2>
			<li><a href="gestion/add_bon.php">Transformer les livraisons en factures</a><br>
			<li><a href="gestion/add_devis.php">Créer un Devis</a><br>
			<li><a href="gestion/add_fact.php">Créer une Facture</a><br>
			<li><a href="gestion/bilan.php">Voir l'historique des ventes</a><br>
			<li><a href="gestion/import.php">Import/Export</a><br>
	</div>
</div>
<?php 
include "footer.php"; 
?>