<?php
// inclusion
include "header.php";
?>
    <div align="center">
		<h1><b>Administration</h1>
	</div>
	<div class="container">
		<br><br>
      <div class="row">
		<div class="col-sm-4">
			<div class="panel panel-default">
            <div class="panel-heading">
              <h3 align="center" class="panel-title"><b>Administration du Parc</h3>
            </div>
            <div class="panel-body">
				<li><a href="admin/aff_tracteurs.php" type="button" class="btn btn-default">Lister les Tracteurs</button></a><br><br>
				<li><a href="admin/aff_remorques.php" type="button" class="btn btn-default">Lister les Remorques</button></a><br>
			</div>
			</div>
		</div>
		
		<div class="col-sm-4">
			<div class="panel panel-default">
            <div class="panel-heading">
              <h3 align="center" class="panel-title"><b>Administration des Chauffeurs</h3>
            </div>
            <div class="panel-body">
				<li><a href="admin/aff_chauffeurs.php" type="button" class="btn btn-default">Lister les Chauffeurs</button></a><br>
			</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="panel panel-default">
            <div class="panel-heading">
              <h3 align="center" class="panel-title"><b>Administration Commerciale</h3>
            </div>
            <div class="panel-body">
				<li><a href="admin/aff_clients.php" type="button" class="btn btn-default">Lister les Clients</button></a><br><br>
				<li><a href="admin/aff_produits.php" type="button" class="btn btn-default">Lister les Services</button></a><br>
			</div>
			</div>
		</div>
	</div>

	<br><br>
	
    <div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-default">
            <div class="panel-heading">
              <h3 align="center" class="panel-title"><b>Administration Logiciel</h3>
            </div>
            <div class="panel-body">
				<li><a href="admin/aff_user.php" type="button" class="btn btn-default">Lister les Utilisateurs</button></a><br>
			</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
    </div>


	</div>
    </div>
<?php 
include "footer.php"; 
?>