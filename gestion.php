<?php
// inclusion
include "fonctions_base.php";
include "fonctions_annexe.php";
include "header.php";
?>
	<div align="center">
		<h1><b>Gestion</h1>
	</div>
	<div class="container">
		<br><br>
      <div class="row">
		<div class="col-sm-4">
			<div class="panel panel-default">
            <div class="panel-heading">
              <h3 align="center" class="panel-title"><b>Gestion du Parc</h3>
            </div>
            <div class="panel-body">
			<li><a href="gestion/ct.php" type="button" class="btn btn-default">Passer un véhicule au contrôle</button></a><br><br>
			<li><a href="gestion/revision.php" type="button" class="btn btn-default">Passer un véhicule à la révision</button></a><br><br>
			<li><a href="gestion/reparation.php" type="button" class="btn btn-default">Réparer un véhicule</button></a><br><br>
			<div class="panel panel-default"><div class="panel-heading"></div></div>
			<li><a href="gestion/hist_controle.php" type="button" class="btn btn-default">Voir l'historique des contrôles</button></a><br><br>
			<li><a href="gestion/hist_revision.php" type="button" class="btn btn-default">Voir l'historique des révisions</button></a><br><br>
			<li><a href="gestion/hist_reparation.php" type="button" class="btn btn-default">Voir l'historique des réparations</button></a><br><br>
			<div class="panel panel-default"><div class="panel-heading"></div></div>
			<li><a href="gestion/hist_entretien.php" type="button" class="btn btn-default">Calculer le coût d'un véhicule</button></a><br>
			</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-default">
            <div class="panel-heading">
              <h3 align="center" class="panel-title"><b>Gestion du Travail</h3>
            </div>
            <div class="panel-body">
			<li><a href="gestion/task.php" type="button" class="btn btn-default">Générer la fiche de travail journalière</button></a><br><br>
			<li><a href="gestion/voyage.php" type="button" class="btn btn-default">Saisir un transport client</button></a><br><br>
			<div class="panel panel-default"><div class="panel-heading"></div></div>
			<li><a href="gestion/hist_livraison.php" type="button" class="btn btn-default">Voir l'historique des transports terminés</button></a><br><br>
			<li><a href="gestion/hist_journalier.php" type="button" class="btn btn-default">Voir l'historique des tâches journalières</button></a><br><br>
			</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-default">
            <div class="panel-heading">
              <h3 align="center" class="panel-title"><b>Gestion Financière</h3>
            </div>
            <div class="panel-body">
			<li><a href="gestion/calc.php" type="button" class="btn btn-default">Calculer le coût d'un transport</button></a><br><br>
			<li><a href="gestion/cmr.php" type="button" class="btn btn-default">Créer une lettre de voiture</button></a><br><br>
			<li><a href="gestion/add_bon.php" type="button" class="btn btn-default">Transformer les livraisons en factures</button></a><br><br>
			<li><a href="gestion/bilan.php" type="button" class="btn btn-default">Historique des factures</button></a><br><br>
			<li><a href="gestion/import.php" type="button" class="btn btn-default">Import/Export</button></a><br>
			</div>
		</div>
	</div>	
	</div>
</div>
<?php 
include "footer.php"; 
?>