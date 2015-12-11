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
      <div class="starter-template">
        <h1>Tableau de Bord au (<?php echo $today; ?>)</h1>
        <p class="lead">
		Il y a <?php echo $c; ?> Chauffeurs dont <?php echo $cl; ?> qui ne travaillent pas<br>
		Il y a <?php echo $t; ?> Tracteurs dont <?php echo $tl; ?> qui ne travaillent pas<br>
		Il y a <?php echo $r; ?> Remorques dont <?php echo $rl;?> sont inutilisées<br>
		</p>
		<p class="lead"><u>Il y a <?php echo $ctr; ?> Tracteur qui doivent passer le C.T ce mois-ci :</u><br>
		<div id="tracteur" class="texte"> <?php include "ct_tracteur.php"; ?>	</div></p>
		<p class="lead"><u>Il y a <?php echo $ctt; ?> Remorque qui doivent passer le C.T ce mois-ci :</u><br>
		<div id="remorque" class="texte"> <?php include "ct_remorque.php"; ?> </div></p>

		</p>
      </div>
    </div><!-- /.container -->

<?php 
include "footer.php"; 
?>