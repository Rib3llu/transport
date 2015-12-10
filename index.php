<html>
    <head><title>Bienvenue sur TRANSPORT </title></head>
    <body>
        <h1>Tableau de Bord</h1>
        <h2>Que voulez-vous faire ?</h2>
		<br>
		<a href="bon.php">Generer un bon de transport</a><br>
		<h2>Affichage</h2>
		<a href="aff_user.php">Lister les Utilisateurs</a><br>
		<a href="aff_clients.php">Lister les Clients</a><br>
		<a href="aff_chauffeurs.php">Lister les Chauffeurs</a><br>
		<a href="aff_tracteurs.php">Lister les Tracteurs</a><br>
		<a href="aff_remorques.php">Lister les Remorques</a><br>
		<a href="aff_produits.php">Lister les Produits</a><br>
		<br>	
		<h2>Administration</h2>
		<a href="add_user.php">Cr&eacuteer un compte utilisateur</a><br>
		<a href="add_client.php">Cr&eacuteer un compte client</a><br>
		<a href="add_chauffeur.php">Cr&eacuteer un chauffeur</a><br>
		<a href="add_tracteur.php">Cr&eacuteer un tracteur</a><br>
		<a href="add_remorque.php">Cr&eacuteer une remorque</a><br>
		<a href="add_produit.php">Cr&eacuteer un produit</a><br>
		<a href="voiture.php">Cr&eacuteer une lettre de voiture</a><br>
		<a href="facture.php">Cr&eacuteer une facture</a><br>
		<a href="societe.php">Cr&eacuteer un emplacement</a><br>
		<p><h2>Infos du jour :</h2>
		Nous sommes le : 
		<?php
		$today = date("Y-m-d");
		$date = date("d-m-Y", strtotime($today));  echo $date; ?> <br>
		<br>
		<h2>Synthèse</h2>
		<p> Il y a <a href="livraison_encours.php">x</a> livraisons en cours</p>
		<p> Il y a <a href="livraison_ok.php">x</a> livraisons termin&eacutees</p>
		<p> Il y a <a href="fact_afaire.php">x</a> factures à générer</p>
		<p> Il y a <a href="fact_encours.php">x</a> factures a valider</p>
		<p> Il y a <a href="lettre_ok.php">x</a> bons de livraisons </p>
		<p> Il y a <a href="fact_ok.php">x</a> factures </p>
		</p>
</html>