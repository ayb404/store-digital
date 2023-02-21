<?php
include "db.php";

$sqlAffich = "SELECT * FROM products ";
$statement = $con->prepare($sqlAffich);
$statement->execute();
$prudact = $statement->fetchAll(PDO::FETCH_OBJ);


$sqlAffich = "SELECT DISTINCT type FROM products ";
$statement = $con->prepare($sqlAffich);
$statement->execute();
$type = $statement->fetchAll(PDO::FETCH_OBJ);
?>


<?php
include "header.php";
?>
    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2>new arrivals</h2>
              <h4>We offer original keys to make a satisfying service and make you happy.</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                <li class="active" data-filter="*">All Products</li>
                <?php  foreach($type as $e): ?>
                  <li data-filter=".<?=$e->type?>"><?= $e->type ?></li>
                  <?php endforeach; ?>
              </ul>
            </div>
          </div>

          <div class="col-md-12">
            <div class="filters-content">
                <div class="row grid">
                  <?php  foreach($prudact as $etu): ?>
                    <div class="col-lg-3 col-md-3 all <?= $etu->type ?>">
                    <div class="product-item">
                    <div align="center"> <a href="prod.php?num=<?=$etu->id;?>"><img src="<?= $etu->image; ?>" alt="..." style="max-width: 250px; height:350px;"></a></div>
                      <div class="down-content">
                        <a href="prod.php?num=<?=$etu->id;?> "><h4><?= $etu->name; ?></h4></a>
                        <h5 align="center"><?= $etu->price;?>$</h5>
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
        </div>
      </div>
    </div>

<?php
  include "footer.php";
?>    