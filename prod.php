<?php
include "db.php";

$num=$_GET['num'];
$sqlAffich = "SELECT * FROM products  WHERE id='".$num."'";
$statement = $con->prepare($sqlAffich);
$statement->execute();
$Produit = $statement->fetch(PDO::FETCH_OBJ);

?>

<?php
include "header.php";
?>

    <!-- *******************************Page Content-->
    <div class="page-heading header-text">
    
    </div>

    <div class="best-features about-features">
      <div class="container">
      
        <form action="" method="post" class="row">
          
          <div class="col-md-12">
            <div class="section-heading">
            </div>
          </div>
        
          <div class="col-md-4">
            <div class="right-image" style="max-width: 250px;height: 300px;">
              <img src="<?= $Produit->image ;?>" alt="...">
            </div>
          </div>
  
          <div class="col-md-8">
            <div class="left-content ml-2">
              <br><br>
              <h4 class="text-danger"><?= $Produit->type ;?></h4>
              <h4><?= $Produit->name ;?></h4>
              <h3><?= $Produit->price ;?>$</h3>
              <br>
              <span style="color: red;">
                <ul class=" row ml-1">
                  <li >Reviews(<?= $Produit->reviews ;?>)</li>
                  <li>&nbsp</li><li>&nbsp</li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
              </span>
              <br>
              <a href="payment/pay.php?id=<?=$Produit->id;?>" class="btn btn-danger " style="margin-left: 40%;">BUY NOW</a>
              <div class="col-md-12  justify-content-center mt-3" >
                <p><?= $Produit->description ;?></p>
              </div>
            </div>
          </div>
          
        </form>
        
      </div>
    </div>
    <!-- ******************************* Page Content -->
    
<?php include "footer.php"; ?> 