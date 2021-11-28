<?php
	$civilite = $_POST[ 'civilite' ] ;
	$nom = strtoupper($_POST[ 'nom' ]) ;
    $prenom = ucfirst($_POST[ 'prenom' ]) ;
	$dateNaissance = $_POST[ 'dateNaissance' ] ;
    $adresseMail = strtolower($_POST[ 'adresseMail' ]) ;
	$mdp = $_POST[ 'mdp' ] ;
    $mdpVerif = $_POST[ 'mdpVerif'] ;
    $adressePostale = $_POST[ 'adressePostale' ] ;
	$codePostale = $_POST[ 'codePostale' ] ;
    $ville = ucfirst($_POST[ 'ville' ]) ;
    $numeroTelephone = $_POST[ 'numeroTelephone' ] ;

    session_start() ;
    $_SESSION['civilite'] = $civilite;
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['dateNaissance'] = $dateNaissance;
    $_SESSION['adresseMail'] = $adresseMail;
    $_SESSION['adressePostale'] = $adressePostale;
    $_SESSION['codePostale'] = $codePostale;
    $_SESSION['ville'] = $ville;
    $_SESSION['numeroTelephone'] = $numeroTelephone;

    if($mdp!= null){
        if($mdpVerif == $mdp){
            try {
                $dbname = 'sbateliers';
                $host = 'localhost';
                $user = 'sanayabio';
                $mdpBD = 'sb2021';
                $port = '3306';
                $dns = "mysql:host=".$host.";dbname=".$dbname.";port=".$port;
                $bd = new PDO($dns, $user, $mdpBD);
                    
                $checkAdresseMail=$bd->query("SELECT numero FROM `Client` where adresseMail IN ('" . $adresseMail . "')");
                $checkAdresseMail= $checkAdresseMail->fetchAll();

                if($checkAdresseMail[0][0]==null){
                    $enregistrer =$bd->query("INSERT INTO `Client` (civilite, nom, prenom, dateNaissance, adresseMail, mdp, adressePostale, codePostale, ville, numeroTelephone)
                                            VALUES('". $civilite ."','". $nom ."','". $prenom ."','". $dateNaissance ."','". $adresseMail ."','"
                                            . $mdp ."','". $adressePostale ."','". $codePostale ."','". $ville ."','". $numeroTelephone ."')");

                    header( 'Location: ../vues/vue-connexion.php?adresseMail=' . $adresseMail);
                }
                else {
                    header( 'Location: ../vues/vue-enregistrement-client.php?echecAdresseMail=0' );
                }
            }
            catch( PDOException $e ){
                
                header( 'Location: ../vues/index.php?echec=0' );
            }
        }
        else{

            try {
                $dbname = 'sbateliers';
                $host = 'localhost';
                $user = 'sanayabio';
                $mdpBD = 'sb2021';
                $port = '3306';
                $dns = "mysql:host=".$host.";dbname=".$dbname.";port=".$port;
                $bd = new PDO($dns, $user, $mdpBD);
                    
                $checkAdresseMail=$bd->query("SELECT numero FROM `Client` where adresseMail IN ('" . $adresseMail . "')");
                $checkAdresseMail= $checkAdresseMail->fetchAll();

                if($checkAdresseMail[0][0]==null){
                header( 'Location: ../vues/vue-enregistrement-client.php?&echecMdp=0');
                }
                else{
                header( 'Location: ../vues/vue-enregistrement-client.php?echecAdresseMail=0&echecMdp=0');
                }
            }
            catch( PDOException $e ){
                
                header( 'Location: ../vues/index.php?echec=0' );
            }
        }
    }
    else{
        header( 'Location: ../vues/vue-enregistrement-client.php?echecMdp=1');
    }

?>
