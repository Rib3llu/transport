<?php

// Fonctions Affichage action réussi
function aff_creer($data){
	$msg = '<br><div class="alert alert-success" role="alert">
        <h3>'.$data.' à bien &eacutet&eacute cr&eacute&eacute...!</strong></h3>
      </div>';
	 return $msg;
}
function aff_modifier($data){
	$msg = '<br><div class="alert alert-success" role="alert">
        <h3>'.$data.' à bien &eacutet&eacute modifi&eacute...!</strong></h3>
      </div>';
	return $msg;
}
function aff_supprimer($data){
	$msg = '<br><div class="alert alert-danger" role="alert">
        <h3>'.$data.' à bien &eacutet&eacute supprim&eacute...!</strong></h3>
      </div>';
	return $msg;
}

// Pied de Page listing, creation, modification, suppression
function piedpage_formulaire($data)
	{
	$msg = '<div class="page-header">
			<a href="aff_'.$data.'.php"><button type="button" class="btn btn-default">Retour au Listing</button></a><br><br>
			<a href="javascript:history.go(-1)" type="button" class="btn btn-primary">Retour</button></a>
		</div>
	  </div>
	</div>';
	return $msg;
	}

// Pied de page tableau listing
function piedpage_tableau($data)
	{
	$msg = '       
			<p>
				<div align="center"><a href="add_'.$data.'.php"><img src="../img/plus.jpg" width="32" height="32" border="0"></a></div>
			</p>
				<div class="page-header"><a href="javascript:history.go(-1)" type="button" class="btn btn-primary">Retour</button></a></div>
	   </div>';
	return $msg;
	}