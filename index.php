
<?php

include "db.php";

$sqlAffich = "SELECT * FROM products ";
$statement = $con->prepare($sqlAffich);
$statement->execute();
$prudact = $statement->fetchAll(PDO::FETCH_OBJ);

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
            <h4>Best Offer</h4>
            <h2 style="">Explore The Best Digital Products You Need</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Flash Deals</h4>
            <h2>Get your best products</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Last Minute</h4>
            <h2>Grab last minute deals</h2>
          </div>
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
              <h4>Name products</h4>
              <p><a rel="nofollow"  target="_parent">This template</a> is free to use for your business websites. However, you have no permission to redistribute the downloadable ZIP file on any template collection website.</p>
              <span style="color: red;">
                <ul class=" row ml-1">
                  <li >Reviews(21)</li>
                  <li>&nbsp</li><li>&nbsp</li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
              </span><br>

              <a href="products.php" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/feature-image.jpg" alt="">
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