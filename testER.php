<!DOCTYPE html>
<html lang="fr">
<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-4">
					<form action=testER.php method="POST">
                        <div class="mb-3 form-group">
							<label class="col-form-label">Chaine de caractère </label>
							<input type="text" class="form-control" name="s" />
						</div>

                        <div class="mb-3 form-group">
							<label class="col-form-label">Expression regulière</label>
							<input type="text" class="form-control" name="er" />
						</div>
                        <div class="mb-3">
							<button class="btn btn-primary" type="submit">Valider</button>
						</div>
					
					</form>
                </div>
            </div>
</div>
<?php 

$s = $_POST[ 's' ] ;
$er = $_POST[ 'er' ] ;

if($er != null and $s != null){
    if( preg_match("/$er/", $s)){
        echo "Correspondance Ok\n";
    }
    else{
        echo "Correspondance Nok\n";
    }
}

?>
</html>
