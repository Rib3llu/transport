<?php
// inclusion
include "header.php";
?>
<div align="center">
		<h1><b>Authentification</h1>
	</div>
	<div class="container">
		<br><br>
      <div class="row">
	  		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-default">
            <div class="panel-heading">
              <h3 align="center" class="panel-title"><b>Veuillez saisir vos identifiants</h3><br>
			  
				<form id='log' method='post' action='auth/auth.php'> 				
				<table align='center'> 
					<tr>
						<td>Login : </td>
						<td>&nbsp;<input name='login' /></td>
					</tr> 
					<tr>
						<td></td>
						<td>&nbsp;</td>
					</tr> 
					<tr>
						<td>Mot de passe : </td>
						<td>&nbsp;<input type='password' name='passwd' /></td>
					</tr> 
					<tr>
						<td></td>
						<td>&nbsp;</td>
					</tr> 
					<tr>
						<td colspan="2" align="center"><input class="btn btn-success" type="submit" name="valider" value="Se Connecter" /></td>
					</tr> 
				</table> 
				</form> 
			</div>
			</div>
		</div>
	  		<div class="col-sm-4"></div>
	</div>
</div>

<?php 
include "footer.php"; 
?>