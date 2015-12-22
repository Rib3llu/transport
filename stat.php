<?php
// inclusion
include "fonctions_base.php";
include "fonctions_annexe.php";
include "header.php";

//date du jour
$today = date("Y-m-d");
$today2 = date("d-m-Y");

		// recuperation des comptes materiel-chauffeur
		$c = compteChauffeur();
		$t = compteTracteur();
		$r = compteRemorque();
		$rl = compteRemorqueLibre();
		$tl = compteTracteurLibre();
		$cl = compteChauffeurLibre();
		$ctt = verifCTTracteur();
		$ctr = verifCTRemorque();
		$cpermis = verifPermis();

?>
	<div align="center">
		<h1>Tableau de Bord au <?php echo $today2; ?></h1>
	</div>
<br>
<!-- Partie Affichage des infos livraisons -->   
   <div class="container">
      <div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3>Livraison en cours</h3>
				</div>
				    <div class="panel-body">
					</div>
			</div>
		</div>
	  </div>
   </div>

<!-- Partie Affichage des infos sur le nombre de chauffeurs et du matériels -->   
   <div class="container">
      <div class="row">
		<div class="col-sm-4">
			<div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Chauffeurs <span class="badge"><?php echo $c; ?></span></h3>
            </div>
            <div class="panel-body">
              <ul class="nav nav-pills" role="tablist">
				<p><a href="admin/aff_chauffeurs.php"><button type="button" class="btn btn-lg btn-success"><font color="black">Libre  </font><span class="badge"><?php echo $cl; ?></span></button></a></p>
				<p><a href="admin/aff_chauffeurs.php"><button type="button" class="btn btn-lg btn-danger"><font color="black">Permis à valider </font><span class="badge"><?php echo  $cpermis; ?></span></button></a></p>
            </div>
          </div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Tracteurs <span class="badge"><?php echo $t; ?></span></h3>
            </div>
            <div class="panel-body">
              <ul class="nav nav-pills" role="tablist">
				<p><a href="admin/aff_tracteurs.php"><button type="button" class="btn btn-lg btn-success"><font color="black">Libre  </font><span class="badge"><?php echo $tl; ?></span></button></a></p>
				<p><a href="gestion/ct.php"><button type="button" class="btn btn-lg btn-danger"><font color="black">Contrôle Technique </font><span class="badge"><?php echo $ctt; ?></span></button></a></p>
				<p><a href="gestion/revision.php"><button type="button" class="btn btn-lg btn-warning"><font color="black">Révision Périodique </font><span class="badge"><?php echo  $cpermis; ?></span></button></a></p>
            </div>
          </div>
		  </div>
		<div class="col-sm-4">
			<div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Remorques <span class="badge"><?php echo $r; ?></span></h3>
            </div>
            <div class="panel-body">
              <ul class="nav nav-pills" role="tablist">
				<p><a href="admin/aff_remorques.php"><button type="button" class="btn btn-lg btn-success"><font color="black">Libre  </font><span class="badge"><?php echo $rl; ?></span></button></a></p>
				<p><a href="gestion/ct.php"><button type="button" class="btn btn-lg btn-danger"><font color="black">Contrôle Technique </font><span class="badge"><?php echo  $ctr; ?></span></button></a></p>
				<p><a href="gestion/revision.php"><button type="button" class="btn btn-lg btn-warning"><font color="black">Révision Périodique </font><span class="badge"><?php echo  $cpermis; ?></span></button></a></p>
            </div>
          </div>
		  </div>
	</div>
</div>		
<?php 
include "footer.php"; 
?>