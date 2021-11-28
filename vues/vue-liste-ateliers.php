<?php session_start() ; ?>
<?php
if( isset($_SESSION) ){
		$inscription = $_SESSION[ 'inscription' ] ;
	} 
?>
<?php

	$ateliers = array() ;

	try {
		$bd = new PDO(
						'mysql:host=localhost;dbname=sbateliers' ,
						'sanayabio' ,
						'sb2021'
			) ;
		$ateliers=$bd->query("SELECT R.nom, R.prenom, A.numero, A.dateHeureProgramme, A.duree, A.nbPlace, A.theme FROM `Atelier` as A, `ResponsableAteliers` as R WHERE A.numeroResponsable=R.numero");
		$ateliers = $ateliers -> fetchall() ;

		$checkInscription=$bd->query("SELECT P.numeroAtelier FROM `Participation` as P, `Client` AS C WHERE P.numeroClient=C.numero AND C.numero=".$_SESSION[ 'numero' ]."");
		$checkInscription= $checkInscription->fetchAll();
		unset( $bd );
	}
	catch( PDOException $e ){
		
		session_unset() ;
		session_destroy() ;
		header( 'Location: ../vues/vue-connexion.php?echec=0' ) ;
	}


?>
<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8">
		<title>Sb Ateliers - Listes Ateliers</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	</head>

	<body>
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="vue-liste-ateliers.php">SB Atelier</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="nav navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="vue-liste-ateliers.php">Liste des ateliers</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="vue-liste-ateliersClient.php">Mes ateliers</a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item">
							<a class="nav-link" href="#"><?php echo $_SESSION[ 'prenom' ] . ' ' . $_SESSION[ 'nom' ]  ?></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../controleurs/ctrl-deconnecter.php">se déconnecter...</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="container-fluid">
		
			<h4 class="alert alert-primary" role="alert">
				Ateliers
			</h4>
			
			<table class="table table-striped">
				<thead>
					<tr>
						<td>Nom du responsable</td>
                        <td>Date et Heure</td>
                        <td>Durée</td>
                        <td>Nombres de places</td>
						<td>Numero Atelier</td>
						<td>Thème</td>
						<td>Inscription</td>

					</tr>
				</thead>
				<tbody>
					<?php $i=0; ?>
					<?php foreach( $ateliers as $unAtelier ){ ?>
						<tr>
							<td><?php echo $unAtelier[ 'prenom' ]." ".$unAtelier[ 'nom'] ; ?></td>
                            <td><?php 
							$dateProgramme = date('Y-m-d', strtotime($unAtelier[ 'dateHeureProgramme' ]));
							$heureProgramme = date('H:i:s', strtotime($unAtelier[ 'dateHeureProgramme' ]));
							echo 'Le '.$dateProgramme.' à '.$heureProgramme; ?></td>
                            <td><?php echo $unAtelier[ 'duree' ] ; ?></td>
                            <td><?php echo $unAtelier[ 'nbPlace' ] ; ?></td>
							<td><?php echo $unAtelier[ 'numero' ] ; ?></td>
                            <td><?php echo $unAtelier[ 'theme' ] ; ?></td>
							<td><?php 

							if(in_array($unAtelier['numero'],$checkInscription[$i])){
								$i=$i+1;
							?>
								<a href="../controleurs/ctrl-participer-atelier.php?atelier=<?php echo $unAtelier[ 'numero' ] ;?>&inscription=false" type='button' class='btn btn-danger'>Se désinscrire</a>
							<?php
							}else{
							?>
								<a href="../controleurs/ctrl-participer-atelier.php?atelier=<?php echo $unAtelier[ 'numero' ] ;?>&inscription=true" type='button' class='btn btn-success'>S'inscrire</a>
							<?php
							}
							?>
							</td>
						</tr>
					<?php } ?>
					
				</tbody>
				
			</table>
		</div>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

	</body>

</html>
