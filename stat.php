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

?>
<!-- Partie Affichage des infos sur le nombre de chauffeurs et du matériels -->   
   <div class="container">
      <div class="row">
        <h1>Tableau de Bord au <?php echo $today2; ?></h1>
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
	<div class="col-sm-1">
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
	</div>
	<br>
<!-- Partie Affichage des points importants, permis, CT Tracteur et remorque 

Permis Chauffeurs
-->
   <div class="row">
		<div class="col-md-8">
		<div class="panel panel-warning">
          <div class="panel-heading">
           <h3 class="panel-title">Il y a <font color="red"><?php echo $ctr; ?></font> Chauffeur(s) qui doivent revalider leur permis ce mois-ci :</h3>
            </div>
            <div class="panel-body">
              <ul class="nav nav-pills" role="tablist">
			  <li role="presentation" class="active">
			  <?php include "permis_chauffeur.php"; ?>
			  </li>
            </div>
          </div>
		</div>
   </div>
		
   <div class="row">
		<div class="col-md-8">
		<div class="panel panel-warning">
          <div class="panel-heading">
           <h3 class="panel-title">Il y a <font color="red"><?php echo $ctr; ?></font> Tracteur(s) qui doivent passer le C.T ce mois-ci :</h3>
            </div>
            <div class="panel-body">
              <ul class="nav nav-pills" role="tablist">
			  <li role="presentation" class="active">
						<?php include "ct_tracteur.php"; ?>
			  </li>
            </div>
          </div>
		</div>
   </div>
			<br>
   <div class="row">
		<div class="col-md-10">
		<div class="panel panel-warning">
          <div class="panel-heading">
           <h3 class="panel-title">Il y a <font color="red"><?php echo $ctt; ?></font> Remorque(s) qui doivent passer le C.T ce mois-ci :</h3>
            </div>
            <div class="panel-body">
              <ul class="nav nav-pills" role="tablist">
			  <li role="presentation" class="active">
				<?php include "ct_remorque.php"; ?>
			  </li>
            </div>
          </div>
		</div>
   </div>
			<br>
<?php 
include "footer.php"; 
?>