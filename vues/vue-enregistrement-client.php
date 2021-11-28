<?php 
	session_start();

	if( isset($_SESSION) ){
		$civilite = $_SESSION[ 'civilite' ] ;
		$nom = $_SESSION[ 'nom' ] ;
		$prenom = $_SESSION[ 'prenom' ] ;
		$dateNaissance = $_SESSION[ 'dateNaissance' ] ;
		$adresseMail = $_SESSION[ 'adresseMail' ] ;
		$adressePostale = $_SESSION[ 'adressePostale' ] ;
		$codePostale = $_SESSION[ 'codePostale' ] ;
		$ville = $_SESSION[ 'ville' ] ;
		$numeroTelephone = $_SESSION[ 'numeroTelephone' ] ;
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
					<form action="../controleurs/ctrl-enregistrer-client.php" method="POST">

                        <div class="mb-3 form-group">
                        </div>
                        <b>Inscriptions</b>
                        <div class="mb-3 form-group">
                        </div>
                        <label class="col-form-label">Civilité</label>
                        <div class="mb-3 form-group">

                        	<div class="form-check form-check-inline">
								<input type="radio"  class="form-check-input" type="radio" name="civilite" id="inlineCheckbox1" value="Monsieur" <?php
								if($_SESSION['civilite']== 'Monsieur')
								{
									echo'checked';
								}
								?>/>
								<label class="form-check-label">Madame</label>
							</div>

							<div class="form-check form-check-inline">
								<input type="radio"  class="form-check-input" type="radio" name="civilite" id="inlineCheckbox2" value="Madame" <?php
								if($_SESSION['civilite']== 'Madame')
								{
									echo'checked';
								}
								?>/>
								<label class="form-check-label">Monsieur</label>
							</div>

							<div class="form-check form-check-inline">
								<input type="radio"  class="form-check-input" type="radio" name="civilite" id="inlineCheckbox3" value="Autres" <?php
								if($_SESSION['civilite']== 'Autres')
								{
									echo'checked';
								}
								elseif(!isset($_SESSION))
								{
									echo'checked';
								}
								?>/>
								<label class="form-check-label">Autres...</label>
							</div>

							<div class="mb-3 form-group">
								<label class="col-form-label">Nom</label>
								<input type="text" class="form-control" name="nom" value="<?php echo $nom ; ?>"/>
							</div>

							<div class="mb-3 form-group">
								<label class="col-form-label">Prenom</label>
								<input type="text" class="form-control" name="prenom" value="<?php echo $prenom ; ?>"/>
							</div>

							<div class="mb-3 form-group">
								<label class="col-form-label">Date de naissance</label>
								<input type="date" class="form-control" name="dateNaissance" value="<?php echo $dateNaissance ; ?>"/>
							</div>

							<div class="mb-3 form-group">
								<label class="col-form-label">Adresse mail</label>
								<input type="text" class="form-control" name="adresseMail" value="<?php echo $adresseMail ; ?>"/>
							</div>
							<?php if( isset($_GET['echecAdresseMail']) ){
									if( $_GET[ 'echecAdresseMail' ] == 0 ){ ?>		
									<div class="alert alert-danger" role="alert">
										Cette adresse Email est déjà utilisée.
									</div>
								<?php } ?>
							<?php } ?>
						
							<div class="mb-3 form-group">
								<label class="col-form-label">Mot de passe</label>
								<input type="password"  class="form-control" name="mdp" />
							</div>
							<?php if( isset($_GET['echecMdp']) ){
									if( $_GET[ 'echecMdp' ] == 1 ){ ?>		
									<div class="alert alert-danger" role="alert">
										Veuillez entrer un mot de passe de plus de 8 caractères.
									</div>
								<?php } ?>
							<?php } ?>

							<div class="mb-3 form-group">
								<label class="col-form-label">Confirmer mot de passe</label>
								<input type="password"  class="form-control" name="mdpVerif" />
							</div>
							<?php if( isset($_GET['echecMdp']) ){
									if( $_GET[ 'echecMdp' ] == 0 ){ ?>		
									<div class="alert alert-danger" role="alert">
										Les mots de passe ne corespondent pas.
									</div>
								<?php } 
									elseif( $_GET[ 'echecMdp' ] == 1 ){ ?>		
									<div class="alert alert-danger" role="alert">
										Et confirmez votre mot de passe.
									</div>
								<?php } ?>
							<?php } ?>
					
							<div class="mb-3 form-group">
								<label class="col-form-label">Adresse postale</label>
								<input type="text"  class="form-control" name="adressePostale" value="<?php echo $adressePostale ; ?>"/>
							</div>

							<div class="mb-3 form-group">
								<label class="col-form-label">Code postal</label>
								<input type="text"  class="form-control" name="codePostale" value="<?php echo $codePostale ; ?>"/>
							</div>

							<div class="mb-3 form-group">
								<label class="col-form-label">Ville</label>
								<input type="text"  class="form-control" name="ville" value="<?php echo $ville ; ?>"/>
							</div>

							<div class="mb-3 form-group">
								<label class="col-form-label">numéro de mobile</label>
								<input type="tel"  class="form-control" name="numeroTelephone" value="<?php echo $numeroTelephone ; ?>"/>
							</div>
							
							<div class="mb-3">
								<button class="btn btn-primary" type="submit">Valider</button>
								<button class="btn btn-primary" type="reset">Annuler</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-4"></div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	</body>
</html>