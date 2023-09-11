
<?php
session_start();
if(!isset($_SESSION["email"])){
    header('location:login.php');
}

include "db.php";

$sqlAffich = "SELECT * FROM orders  where valide = 0 ";
$statement = $con->prepare($sqlAffich);
$statement->execute();
$prudact = $statement->fetchAll(PDO::FETCH_OBJ);

if(isset($_POST["valider"])){

    $sqlRech= "UPDATE `orders` SET `valide` = '1' WHERE `orders`.`id` ='".$_POST["id"]."'";
    $statement = $con->prepare($sqlRech);
    $statement->execute();
    header ('location:admin.php');  
}

?>

<?php
include "header.php";
?>

    <div class="page-heading header-text">
    
    </div>

    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-products">
                        <div class="d-flex justify-content-between">
                            <h3>List Orders </h3>
                            <a href="dec.php" class="btn btn-danger" onclick=" return confirm('voulez-vous Déconnecter oui/non')"><font color=black id="dec">DÉCONNEXION</font></a>
                        </div>
                        <hr>
                        <div class="container">
                            <div class="row pt-4 bg-info">
                                <?php  foreach($prudact as $etu): ?>
                                <div class="col-md-4">
                                    <div class="product-item rounded">
                                        <div class="down-content bg-light">
                                            <div class="d-flex justify-content-between"><h5 align="center"  class="text-primary"><?= $etu->date ?></h5><a class="btn btn-danger btn-sm" href="action.php?cmd=<?=$etu->id;?>">X</a></div>
                                            <b><?= $etu->name;?></b><br>
                                            <b><?= $etu->email;?></b><br>
                                            <b><?= $etu->phone;?></b><br>
                                            <b><?= $etu->country;?></b><br>
                                            <b><?= $etu->payment;?></b>
                                            <h5 align="center" class="text-primary"><?= $etu->product; ?></h5>
                                            <h5 align="center" class="text-primary"><?= $etu->type; ?></h5>
                                            <h5 align="center" class="text-primary"><?= $etu->price; ?>$</h5> 
                                            <form align="center" action="" method="post">
                                                <input hidden type="text" name="id" id="id" value="<?= $etu->id;?>">
                                                <button class="btn btn-primary text-center mt-4" type="submit" name="valider">
                                                    Confirmer Order
                                                </button>
                                            </form>  
                                                          
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            



<?php
  include "footer.php";
?>