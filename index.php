<?php
// inclusion
include "fonctions_base.php";
include "fonctions_annexe.php";
include "header.php";

//date du jour
$today = date("d-m-Y");
?>

    <div class="container">
      <div class="starter-template">
        <h1>Bienvenue sur Transport ALTAGNA</h1>
        <br><p class="lead">Servez-vous du menu en haut pour naviguer.<br><br> Nous sommes le <?php echo $today; ?>.</p>
      </div>
    </div><!-- /.container -->

<?php 
include "footer.php"; 
?>