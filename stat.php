<?php
// inclusion
include "header.php";
?>
	<div align="center">
		<h1>Tableau de Bord au <?php echo date("d-m-Y"); ?></h1>
	</div>
<br>
<!-- Partie Affichage des infos livraisons -->   
   <div class="container">
      <div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
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
			<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Chauffeurs <span class="badge"><?php echo compteChauffeur(); ?></span></h3>
            </div>
            <div class="panel-body">
              <ul class="nav nav-pills" role="tablist">
			  <?php
				// Affichage des chauffeurs libres
			  	$cl = compteChauffeurLibre();
					if ( $cl == '0')
						{
							echo '<p><a href="admin/aff_chauffeurs.php"><button type="button" class="btn btn-lg btn-danger"><font color="black">Libre  </font><span class="badge">'.$cl.'</span></button></a></p>';
						}
					else
						{
							echo '<p><a href="admin/aff_chauffeurs.php"><button type="button" class="btn btn-lg btn-success"><font color="black">Libre  </font><span class="badge">'.$cl.'</span></button></a></p>';
						}
				// Affichage des permis à revoir
			  	$vpermis = verifPermis();
					if ( $vpermis == '0')
						{
							echo '<p><a href="admin/aff_chauffeurs.php"><button type="button" class="btn btn-lg btn-success"><font color="black">Permis à valider </font><span class="badge">'.$vpermis.'</span></button></a></p>';
						}
					else
						{
							echo '<p><a href="admin/aff_chauffeurs.php"><button type="button" class="btn btn-lg btn-danger"><font color="black">Permis à valider </font><span class="badge">'.$vpermis.'</span></button></a></p>';
						}
				// Affichage des fimo à revoir
			  	$fimo = verifFIMO();
					if ( $fimo == '0')
						{
							echo '<p><a href="admin/aff_chauffeurs.php"><button type="button" class="btn btn-lg btn-success"><font color="black">FIMO à prévoir </font><span class="badge">'.$fimo.'</span></button></a></p>';
						}
					else
						{
							echo '<p><a href="admin/aff_chauffeurs.php"><button type="button" class="btn btn-lg btn-danger"><font color="black">FIMO à prévoir </font><span class="badge">'.$fimo.'</span></button></a></p>';
						}
				// Affichage des matieres dangeureuses à revoir
			  	$matiere = verifMatiere();
					if ( $matiere == '0')
						{
							echo '<p><a href="admin/aff_chauffeurs.php"><button type="button" class="btn btn-lg btn-success"><font color="black">Matière dangeureuse à prévoir </font><span class="badge">'.$matiere.'</span></button></a></p>';
						}
					else
						{
							echo '<p><a href="admin/aff_chauffeurs.php"><button type="button" class="btn btn-lg btn-danger"><font color="black">Matière dangeureuse à prévoir </font><span class="badge">'.$matiere.'</span></button></a></p>';
						}
				// Affichage des produits petroliers à revoir
			  	$pp = verifPPetrolier();
					if ( $pp == '0')
						{
							echo '<p><a href="admin/aff_chauffeurs.php"><button type="button" class="btn btn-lg btn-success"><font color="black">Produits pétroliers à prévoir </font><span class="badge">'.$pp.'</span></button></a></p>';
						}
					else
						{
							echo '<p><a href="admin/aff_chauffeurs.php"><button type="button" class="btn btn-lg btn-danger"><font color="black">Produits pétroliers à prévoir </font><span class="badge">'.$pp.'</span></button></a></p>';
						}
			?>
            </div>
          </div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Tracteurs <span class="badge"><?php echo compteTracteur(); ?></span></h3>
            </div>
            <div class="panel-body">
              <ul class="nav nav-pills" role="tablist">
			  <?php
				// Affichage des Tracteurs qui bossent
			  	$tu = compteTracteurUtilise();
					if ( $tu == '0')
						{
							echo '<p><a href="admin/aff_tracteurs.php"><button type="button" class="btn btn-lg btn-danger"><font color="black">En fonction  </font><span class="badge">'.$tu.'</span></button></a></p>';
						}
					else
						{
							echo '<p><a href="admin/aff_tracteurs.php"><button type="button" class="btn btn-lg btn-primary"><font color="black">En fonction  </font><span class="badge">'.$tu.'</span></button></a></p>';
						}
				// Affichage des Tracteurs en panne
			  	$tp = compteTracteurPanne();
					if ( $tp == '0')
						{
							echo '<p><a href="admin/aff_tracteurs.php"><button type="button" class="btn btn-lg btn-success"><font color="black">En Panne  </font><span class="badge">'.$tp.'</span></button></a></p>';
						}
					else
						{
							echo '<p><a href="admin/aff_tracteurs.php"><button type="button" class="btn btn-lg btn-danger"><font color="black">En Panne  </font><span class="badge">'.$tp.'</span></button></a></p>';
						}
				// Affichage des Tracteurs libres
			  	$tl = compteTracteurLibre();
					if ( $tl == '0')
						{
							echo '<p><a href="admin/aff_tracteurs.php"><button type="button" class="btn btn-lg btn-warning"><font color="black">Libre  </font><span class="badge">'.$tl.'</span></button></a></p>';
						}
					else
						{
							echo '<p><a href="admin/aff_tracteurs.php"><button type="button" class="btn btn-lg btn-success"><font color="black">Libre  </font><span class="badge">'.$tl.'</span></button></a></p>';
						}
				// Affichage des Tracteurs a controler
				$ctt = verifCTTracteur();
					if ( $ctt == '0')
						{
							echo '<p><a href="gestion/ct.php"><button type="button" class="btn btn-lg btn-success"><font color="black">Contrôle Technique  </font><span class="badge">'.$ctt.'</span></button></a></p>';
						}
					else
						{
							echo '<p><a href="gestion/ct.php"><button type="button" class="btn btn-lg btn-danger"><font color="black">Contrôle Technique  </font><span class="badge">'.$ctt.'</span></button></a></p>';
						}
				// Affichage des Tracteurs a controler
				$rt = verifRevisionTracteur();
					if ( $rt == '0')
						{
							echo '<p><a href="gestion/revision.php"><button type="button" class="btn btn-lg btn-success"><font color="black">Révision Périodique   </font><span class="badge">'.$rt.'</span></button></a></p>';
						}
					else
						{
							echo '<p><a href="gestion/revision.php"><button type="button" class="btn btn-lg btn-warning"><font color="black">Révision Périodique   </font><span class="badge">'.$rt.'</span></button></a></p>';
						}
				?>
            </div>
          </div>
		  </div>
		<div class="col-sm-4">
			<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Remorques <span class="badge"><?php echo compteRemorque(); ?></span></h3>
            </div>
            <div class="panel-body">
              <ul class="nav nav-pills" role="tablist">
			  <?php
				// Affichage des Remorques en fonction
			  	$ru = compteRemorqueUtilise();
					if ( $ru == '0')
						{
							echo '<p><a href="admin/aff_remorques.php"><button type="button" class="btn btn-lg btn-warning"><font color="black">En fonction  </font><span class="badge">'.$ru.'</span></button></a></p>';
						}
					else
						{
							echo '<p><a href="admin/aff_remorques.php"><button type="button" class="btn btn-lg btn-success"><font color="black">En fonction  </font><span class="badge">'.$ru.'</span></button></a></p>';
						}
				// Affichage des Remorques en panne
			  	$rp = compteRemorquePanne();
					if ( $rp == '0')
						{
							echo '<p><a href="admin/aff_remorques.php"><button type="button" class="btn btn-lg btn-success"><font color="black">En Panne  </font><span class="badge">'.$rp.'</span></button></a></p>';
						}
					else
						{
							echo '<p><a href="admin/aff_remorques.php"><button type="button" class="btn btn-lg btn-danger"><font color="black">En Panne  </font><span class="badge">'.$rp.'</span></button></a></p>';
						}
				// Affichage des Remorques libres
			  	$rl = compteRemorqueLibre();
					if ( $rl == '0')
						{
							echo '<p><a href="admin/aff_remorques.php"><button type="button" class="btn btn-lg btn-warning"><font color="black">Libre  </font><span class="badge">'.$rl.'</span></button></a></p>';
						}
					else
						{
							echo '<p><a href="admin/aff_remorques.php"><button type="button" class="btn btn-lg btn-success"><font color="black">Libre  </font><span class="badge">'.$rl.'</span></button></a></p>';
						}
				// Affichage des Tracteurs a controler
				$ctr = verifCTRemorque();
					if ( $ctr == '0')
						{
							echo '<p><a href="gestion/ct.php"><button type="button" class="btn btn-lg btn-success"><font color="black">Contrôle Technique  </font><span class="badge">'.$ctr.'</span></button></a></p>';
						}
					else
						{
							echo '<p><a href="gestion/ct.php"><button type="button" class="btn btn-lg btn-danger"><font color="black">Contrôle Technique  </font><span class="badge">'.$ctr.'</span></button></a></p>';
						}
				// Affichage des Tracteurs a controler
				$rr = verifRevisionRemorque();
					if ( $rr == '0')
						{
							echo '<p><a href="gestion/revision.php"><button type="button" class="btn btn-lg btn-success"><font color="black">Révision Périodique   </font><span class="badge">'.$rr.'</span></button></a></p>';
						}
					else
						{
							echo '<p><a href="gestion/revision.php"><button type="button" class="btn btn-lg btn-warning"><font color="black">Révision Périodique   </font><span class="badge">'.$rr.'</span></button></a></p>';
						}
				?>
            </div>
          </div>
		  </div>
	</div>
</div>		
<?php 
include "footer.php"; 
?>