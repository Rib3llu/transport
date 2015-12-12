<?php
// inclusion
include "fonctions_base.php";
include "fonctions_annexe.php";
include "header.php";
?>
    <div class="container">
      <div>
		<h2>Administration du Parc</h2>
		<li><a href="admin/aff_tracteurs.php">Lister les Tracteurs</a><br>
		<li><a href="admin/aff_remorques.php">Lister les Remorques</a><br>
		<h2>Administration des Chauffeurs</h2>
		<li><a href="admin/aff_chauffeurs.php">Lister les Chauffeurs</a><br>
		<h2>Administratif Général</h2>
		<li><a href="admin/aff_user.php">Lister les Utilisateurs</a><br>
		<li><a href="admin/aff_clients.php">Lister les Clients</a><br>
		<li><a href="admin/aff_produits.php">Lister les Produits</a><br>
		<br>
      </div>
    </div>
<?php 
include "footer.php"; 
?>