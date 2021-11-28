<?php session_start() ; ?>
<?php 
        $inscription = $_GET[ 'inscription' ];
        $numeroAtelier = $_GET['atelier'];
        $numeroClient = $_SESSION['numero'];
        date_default_timezone_set('Europe/Berlin');
        $date = date('Y-m-d', time());
?>
<?php
try {
        $dbname = 'sbateliers';
        $host = 'localhost';
        $user = 'sanayabio';
        $mdpBD = 'sb2021';
        $port = '3306';
        $dns = "mysql:host=".$host.";dbname=".$dbname.";port=".$port;
        $bd = new PDO($dns, $user, $mdpBD);

        if($inscription == "true"){
                $inscription=$bd->query("INSERT INTO `Participation` VALUES('".$numeroClient."','".$numeroAtelier."','".$date."')");
                header( 'Location: ../vues/vue-liste-ateliers.php' ) ;
        }
        else{
                echo "TG";
                $deinscription=$bd->query("DELETE FROM `Participation` WHERE `numeroClient`=".$numeroClient." AND `numeroAtelier`=".$numeroAtelier."");
                header( 'Location: ../vues/vue-liste-ateliers.php' ) ;

        }
}
catch( PDOException $e ){
        header( 'Location: ../vues/index.php?echec=0' );
}




?>
