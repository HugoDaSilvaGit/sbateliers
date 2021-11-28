<?php 
	if( isset($_GET[ 'adresseMail' ]) ){
		$adresseMail = $_GET[ 'adresseMail' ] ;
	} 
	else {
		$adresseMail = '' ;	
	} 
?>
<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8">
		<title>SB Ateliers</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

	</head>

	<body>
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">SB Atelier</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
		</nav>
		
	
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4"></div>
				
				<div class="col-lg-4">
					<form action="../controleurs/ctrl-connecter.php" method="GET">
					
						<div class="mb-3 form-group">
							<label class="col-form-label">Adresse mail</label>
							<input type="email" class="form-control" name="adresseMail" value="<?php echo $adresseMail ; ?>" required="required"/>
							
						</div>
						
						<div class="mb-3 form-group">
							<label class="col-form-label">Mot de passe</label>
							<input type="password"  class="form-control" name="mdp" required="required" />
						</div>
						
						<div class="mb-3 form-group">
							<button class="btn btn-primary" type="submit">Connexion</button>
							<a href="../vues/vue-enregistrement-client.php" type="button" class="btn btn-secondary">S'enregistrer</a>
						</div>
					
					</form>
					<?php if( isset($_GET[ 'echec' ]) ){ ?>
						<?php if( $_GET[ 'echec' ] == 1 ){ ?>			
							<div class="alert alert-danger" role="alert">
								adresseMail ou mot de passe incorrect.
							</div>
						<?php } else if( $_GET[ 'echec' ] == 0 ){ ?>
							<div class="alert alert-danger" role="alert">
								Site momentanément indisponible.
							</div>
						<?php } ?>
					<?php } ?>
				</div>
				
				<div class="col-lg-4"></div>
			</div>
		</div>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

	</body>

</html>
