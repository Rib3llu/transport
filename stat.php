<?php
// inclusion
include "fonctions_base.php";
include "fonctions_annexe.php";
include "header.php";

//date du jour
$today = date("Y-m-d");

		// recuperation des comptes materiel-chauffeur
		$c = compteChauffeur();
		$t = compteTracteur();
		$r = compteRemorque();
		$rl = compteRemorqueLibre();
		$tl = compteTracteurLibre();
		$cl = compteChauffeurLibre();
		$ctt = verifCTTracteur();
		$ctr = verifCTRemorque();

?>
    <div class="container">
      <div class="row">
        <h1>Tableau de Bord au <?php echo $today; ?></h1>
			<br>
			<div class="col-sm-4">
			<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Informations sur les Chauffeurs</h3>
            </div>
            <div class="panel-body">
              <ul class="nav nav-pills" role="tablist">
			  <li role="presentation" class="active"><a href="admin/aff_chauffeurs.php">Chauffeurs <span class="badge"><?php echo $c; ?></span></a></li>
				<p>
					<a href="admin/aff_chauffeurs.php">Libre <span class="badge"><?php echo $cl; ?></span></a>
				</p>
            </div>
          </div>
		  </div>
		<div class="col-sm-4">
		<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Informations sur le Matériel</h3>
            </div>
            <div class="panel-body">
              <ul class="nav nav-pills" role="tablist">
			<li role="presentation" class="active"><a href="admin/aff_tracteurs.php">Tracteurs <span class="badge"><?php echo $t; ?></span></a></li>
				<p>
					<a href="aff_tracteurs.php">Libre <span class="badge"><?php echo $tl; ?></span></a>
				</p>
			<br>
			  <ul class="nav nav-pills" role="tablist">
			<li role="presentation" class="active"><a href="admin/aff_remorques.php">Remorques <span class="badge"><?php echo $r; ?></span></a></li>
				<p>
					<a href="aff_remorques.php">Libre <span class="badge"><?php echo $rl; ?></span></a>
				</p>
            </div>
          </div>
		</div>
				<p>
					<h3><span class="label label-warning"><i>Il y a <?php echo $ctr; ?> Tracteur(s) qui doivent passer le C.T ce mois-ci :</i></span></h2>
				</p>
			<br>
		<div>
				<?php include "ct_tracteur.php"; ?>
		</div>
			<br>
				<p>
					<h3><span class="label label-warning">Il y a <?php echo $ctt; ?> Remorque(s) qui doivent passer le C.T ce mois-ci :</span></h2>
				</p>
			<br>
		<div>
				<?php include "ct_remorque.php"; ?>
		</div>
		</div>
      </div>
<?php 
include "footer.php"; 
?>