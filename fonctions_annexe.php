<?php
// fonctions annexes
// comptage des chauffeurs
function compteChauffeur(){
	//On se connecte
	connectBase();
	$result = mysql_query("SELECT * FROM chauffeur");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}
function compteChauffeurLibre(){
	//On se connecte
	connectBase();
	$result = mysql_query("SELECT * FROM chauffeur WHERE 'use' = 0");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}

// comptage des tracteurs
function compteTracteur(){
	//On se connecte
	connectBase();
	$result = mysql_query("SELECT * FROM tracteur");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}
function compteTracteurLibre(){
	//On se connecte
	connectBase();
	$result = mysql_query("SELECT * FROM tracteur WHERE 'use' = 0");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}

// comptage des remorques
function compteRemorque(){
	//On se connecte
	connectBase();
	$result = mysql_query("SELECT * FROM remorque");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}
function compteRemorqueLibre(){
	//On se connecte
	connectBase();
	$result = mysql_query("SELECT * FROM remorque WHERE 'use' = 0");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}

// comptage des bons

// verifier controle technique
function verifCTTracteur(){
	
	// date du jour
	$today = date("Y-m-d");
	//On se connecte
	connectBase();
	// On selectionne
	$result = mysql_query("SELECT * FROM tracteur WHERE visite < '$today'");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}
function verifCTRemorque(){
	
	// date du jour
	$today = date("Y-m-d");
	//On se connecte
	connectBase();
	// On selectionne
	$result = mysql_query("SELECT * FROM remorque WHERE controle < '$today'");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}

// verifier revision periodique
function verifRevisionTracteur(){
	
	// date du jour
	$today = date("Y-m-d");
	//On se connecte
	connectBase();
	// On selectionne
	$result = mysql_query("SELECT * FROM tracteur WHERE entretien < '$today'");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}
function verifRevisionRemorque(){
	
	// date du jour
	$today = date("Y-m-d");
	//On se connecte
	connectBase();
	// On selectionne
	$result = mysql_query("SELECT * FROM remorque WHERE revision < '$today'");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}

// verifier date permis
function verifPermis(){
	
	// date du jour
	$today = date("Y-m-d");
	//On se connecte
	connectBase();
	// On selectionne
	$result = mysql_query("SELECT * FROM chauffeur WHERE expiration < '$today'");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}

// verifier date fimo

?>