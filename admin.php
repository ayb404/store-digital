
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

<div class="">
    <div class="container"><div class="row"></div></div>
</div>
            

<div class="latest-products">
    <div class="container d-flex justify-content-between">
        <!-- <b></b> -->
        <h3>List Orders </h3>
        <a href="dec.php" class="btn btn-danger" onclick=" return confirm('voulez-vous Déconnecter oui/non')"><font color=black id="dec">DÉCONNEXION</font></a>
    </div>
    <hr>
    <div class="container">
        <div class="row pt-4 bg-info">
            <?php  foreach($prudact as $etu): ?>
            <div class="col-md-4">
                <div class="product-item">
                    <div class="down-content bg-light">
                        <h5 align="center"><?= $etu->date ?></h5><br>
                        <h4><?= $etu->name;?></h4>
                        <h4><?= $etu->email;?></h4>
                        <h4><?= $etu->phone;?></h4>
                        <h4><?= $etu->country;?></h4>
                        <h4><?= $etu->payment;?></h4>
                        <h5 align="center"><?= $etu->product; ?></h5>
                        <h5 align="center"><?= $etu->type; ?></h5>
                        <h5 align="center"><?= $etu->price; ?>$</h5> 
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

<?php
  include "footer.php";
?>