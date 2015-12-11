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
<?php /*
        <h1>Tableau de Bord</h1>
		<a href="bon.php">Generer un bon de transport</a><br>
		<p><h2>Infos du jour :</h2>
		Nous sommes le : <?php $date = date("d-m-Y", strtotime($today));  echo $date; ?>
		</p>
		<p> Il y a <?php echo $c; ?> Chauffeurs dont <?php echo $cl; ?> qui ne travail pas</p>
		<p> Il y a <?php echo $t; ?> Tracteurs dont <?php echo $tl; ?> qui ne travail pas</p>
		<p> Il y a <?php echo $r; ?> Remorques dont <?php echo $rl;?> sont inutilisées</p>
		<p><u>Il y a <?php echo $ctr; ?> Tracteur qui doivent passer le C.T ce mois-ci :</u></p>
		<div id="tracteur" class="texte"> <?php include "ct_tracteur.php"; ?>	</div>
		<p><u>Il y a <?php echo $ctt; ?> Remorque qui doivent passer le C.T ce mois-ci :</u></p>
		<div id="remorque" class="texte"> <?php include "ct_remorque.php"; ?> </div>
		<p> Il y a <a href="livraison_encours.php">x</a> livraisons en cours</p>
		<p> Il y a <a href="livraison_ok.php">x</a> livraisons termin&eacutees</p>
		<p> Il y a <a href="fact_afaire.php">x</a> factures à générer</p>
		<p> Il y a <a href="fact_encours.php">x</a> factures a valider</p>
		<p> Il y a <a href="lettre_ok.php">x</a> bons de livraisons </p>
		<p> Il y a <a href="fact_ok.php">x</a> factures </p>
		<h2>Administration</h2>
		<a href="aff_user.php">Lister les Utilisateurs</a><br>
		<a href="aff_clients.php">Lister les Clients</a><br>
		<a href="aff_chauffeurs.php">Lister les Chauffeurs</a><br>
		<a href="aff_tracteurs.php">Lister les Tracteurs</a><br>
		<a href="aff_remorques.php">Lister les Remorques</a><br>
		<a href="aff_produits.php">Lister les Produits</a><br>
		<br>*/ ?>
		
		<div class="navbar navbar-inverse navbar-fixed-top">

      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Altagna</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="bord.php">Tableau de Bord</a></li>
            <li><a href="gestion.php">Gestion</a></li>
            <li><a href="admin.php">Administration</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
      <div class="starter-template">
        <h1>Bienvenue</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>
    </div><!-- /.container -->

<?php include "footer.php"; ?>		