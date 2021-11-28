<?php
	
	$adresseMail = $_GET[ 'adresseMail' ] ;
	$mdp = $_GET[ 'mdp' ] ;
	
	try {

		$bd = new PDO(
						'mysql:host=localhost;dbname=sbateliers' ,
						'sanayabio' ,
						'sb2021'
			) ;
			
		$sql = 'select numero , nom , prenom '
			 . 'from Client '
			 . 'where adresseMail = :adresseMail '
			 . 'and mdp = :mdp' ;
			 
		$st = $bd -> prepare( $sql ) ;
		
		$st -> execute( array( 
								':adresseMail' => $adresseMail ,
								':mdp' => $mdp 
						) 
					) ;
		$resultat = $st -> fetchall() ;
			
		unset( $bd ) ;
		
		if( count( $resultat ) == 1 ) {
			session_start() ;
			$_SESSION[ 'numero' ] = $resultat[0]['numero'] ;
			$_SESSION[ 'nom' ] = $resultat[0]['nom'] ;
			$_SESSION[ 'prenom' ] = $resultat[0]['prenom'] ;
			
			$_SESSION[ 'adresseMail' ] = $adresseMail ;
			
			header( 'Location: ../vues/vue-liste-ateliers.php' ) ;
		}
		else {
			header( 'Location: ../vues/vue-connexion.php?echec=1&adresseMail=' . $adresseMail ) ;
		}
	}
	catch( PDOException $e ){
		
		header( 'Location: ../vues/vue-connexion.php?echec=0' ) ;
	}

?>
