
<?php

include "db.php";

$sqlAffich = "SELECT * FROM products where active = 1 ";
$statement = $con->prepare($sqlAffich);
$statement->execute();
$prudact = $statement->fetchAll(PDO::FETCH_OBJ);


$sql = "SELECT * FROM products ORDER BY id DESC LIMIT 1 ";
$statement = $con->prepare($sql);
$statement->execute();
$prud = $statement->fetch(PDO::FETCH_OBJ);



?>



<?php
include "header.php";
?>
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">

            <h2 style="">Explore The Best Digital Products You Need</h2>
          </div>
        </div>
        <div class="banner-item-02">
          
        </div>
        <div class="banner-item-03">
          
        </div>
      </div>
    </div>

    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="products.php">view all products <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <?php  foreach($prudact as $etu): ?>
            <div class="col-md-3">
              <div class="product-item">
                <div align="center"> <a href="prod.php?num=<?=$etu->id;?>"><img src="<?= $etu->image; ?>" alt="..." style="max-width: 250px; height:350px;"></a></div>
                <div class="down-content">
                    <h5 class="text-danger"><?= $etu->type; ?></h5><br>
                    <a href="prod.php?num=<?=$etu->id;?> "><h4><?= $etu->name;?></h4></a>
                    <h5 align="center"><?= $etu->price; ?>$</h5>
                    <!-- <p><?= $etu->description; ?></p> -->
                    <ul class="stars">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>Reviews (<?= $etu->reviews; ?>)</span>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  
    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Looking for the best products?</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h5 class="text-danger"><?= $prud->type; ?></h5><br>
              <a href="prod.php?num=<?=$prud->id;?> "><h4><?= $prud->name;?></h4></a>
              <h5><?= $prud->price; ?>$</h5><br>
              <p><a rel="nofollow"  target="_parent"><?= $prud->description ;?>.</p>
              <span style="color: red;">
                <ul class=" row ml-1">
                  <li >Reviews(<?= $prud->reviews ;?>)</li>
                  <li>&nbsp</li><li>&nbsp</li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
              </span><br>

              <a href="prod.php?num=<?=$prud->id;?> " class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div align="center" class="right-image">
              <a href="prod.php?num=<?=$prud->id;?>"><img src="<?= $prud->image ;?>" alt="" style="max-width: 250px; height:350px; " ></a>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>READY TO DO  <em>THIS</em> </h4>
                  <h6 style="color: red;"> Let's get to Shop</h6>
                </div>
                <div class="col-md-4">
                  <a href="products.php" class="filled-button">Purchase Now</a>
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