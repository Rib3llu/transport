<?php
// fonctions annexes

// Statistiques Chauffeurs
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
function verifPermis(){
	// Alarme 3 mois avant
	$date  = date("Y-m-d", strtotime("+3 month"));
	//On se connecte
	connectBase();
	// On selectionne
	$result = mysql_query("SELECT * FROM chauffeur WHERE expiration < '$date' AND expiration != '0000-00-00'");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}
function verifFIMO(){
	// Alarme 3 mois avant
	$date  = date("Y-m-d", strtotime("+3 month"));
	//On se connecte
	connectBase();
	// On selectionne
	$result = mysql_query("SELECT * FROM chauffeur WHERE fimo < '$date' AND fimo != '0000-00-00'");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}
function verifMatiere(){
	// Alarme 3 mois avant
	$date  = date("Y-m-d", strtotime("+3 month"));
	//On se connecte
	connectBase();
	// On selectionne
	$result = mysql_query("SELECT * FROM chauffeur WHERE matiere < '$date' AND matiere != '0000-00-00'");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}
function verifPPetrolier(){
	// Alarme 3 mois avant
	$date  = date("Y-m-d", strtotime("+3 month"));
	//On se connecte
	connectBase();
	// On selectionne
	$result = mysql_query("SELECT * FROM chauffeur WHERE ppetrolier < '$date' AND ppetrolier != '0000-00-00'");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}

// Statistiques Tracteurs
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
	$result = mysql_query("SELECT * FROM tracteur WHERE `etat` = 0");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}
function compteTracteurUtilise(){
	//On se connecte
	connectBase();
	$result = mysql_query("SELECT * FROM tracteur WHERE `etat` = 1");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}
function compteTracteurPanne(){
	//On se connecte
	connectBase();
	$result = mysql_query("SELECT * FROM tracteur WHERE `etat` = 2");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}
function verifCTTracteur(){
	// Alarme 1 mois avant
	$date  = date("Y-m-d", strtotime("+1 month"));
	//On se connecte
	connectBase();
	// On selectionne
	$result = mysql_query("SELECT * FROM tracteur WHERE visite < '$date' AND visite != '0000-00-00'");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}
function verifRevisionTracteur(){
	// Alarme 1 mois avant
	$date  = date("Y-m-d", strtotime("+1 month"));
	//On se connecte
	connectBase();
	// On selectionne
	$result = mysql_query("SELECT * FROM tracteur WHERE entretien < '$date' AND entretien != '0000-00-00'");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}

// Statistiques Remorques
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
	$result = mysql_query("SELECT * FROM remorque WHERE `etat` = 0");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}
function compteRemorqueUtilise(){
	//On se connecte
	connectBase();
	$result = mysql_query("SELECT * FROM remorque WHERE `etat` = 1");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}
function compteRemorquePanne(){
	//On se connecte
	connectBase();
	$result = mysql_query("SELECT * FROM remorque WHERE `etat` = 2");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}

function verifCTRemorque(){
	// Alarme 1 mois avant
	$date  = date("Y-m-d", strtotime("+1 month"));
	//On se connecte
	connectBase();
	// On selectionne
	$result = mysql_query("SELECT * FROM remorque WHERE controle < '$date' AND controle != '0000-00-00'");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}
function verifRevisionRemorque(){
	// Alarme 1 mois avant
	$date  = date("Y-m-d", strtotime("+1 month"));
	//On se connecte
	connectBase();
	// On selectionne
	$result = mysql_query("SELECT * FROM remorque WHERE revision < '$date' AND revision != '0000-00-00'");
	$num_rows = mysql_num_rows($result);
	//On envoi le resultat
	return $num_rows;
	// on ferme la connexion
	mysql_close();
}

?>