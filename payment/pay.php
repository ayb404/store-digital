
<?php
$servername="localhost";
$username="root";
$password="";
$db="sixteen";


// Create connection
$con= new PDO("mysql:host=$servername;dbname=$db",$username,$password);

if(isset($_POST['valide'])){
  try{
    $reqinsert="insert into `orders` values(null,'".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['country']."','".$_POST['payment']."','".$_POST['prod']."','".$_POST['type']."','".$_POST['price']."',current_timestamp(),0)";
    $con->exec($reqinsert);
    header("Location: http://localhost/Sixteen/prod.php?num=".$_POST['ids']);
  }
  catch(PDOException $ex){
      echo'la connexion non réussi'.$ex->getMessage();
  }
}

$num=$_GET['id'];
$sqlAffich = "SELECT * FROM products  WHERE id='".$num."'";
$statement = $con->prepare($sqlAffich);
$statement->execute();
$Prod = $statement->fetch(PDO::FETCH_OBJ);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    <link rel="icon" href="pics/000.png">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
    </style>
    <link rel="stylesheet" href="style.css" />
    <script src="index.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Document</title>
  </head>
  <body>

  <div class="d-flex justify-content-center">
    <div class="container ">
      <div class="form">
        <div class="form-padding">

          <h2 class="title">Your Order</h2>
          <table id="order-table">
            <thead>
              <tr>
                <th colspan="2">Product</th>
                <th class="align-right">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="2" class="gray product">
                  <?=$Prod->name;?>
                </td>

                <td class="align-right gray"><?=$Prod->price;?> $</td>
              </tr>

            </tbody>
            <tfoot>
              <tr>
                <td colspan="2" class="total">Total</td>
                <td class="align-right total"><?=$Prod->price;?> $</td>
              </tr>
            </tfoot>
          </table>

          <h3 class="title">Contact Information</h3>

          <form action="pay.php" method="post">
            <div class="input-container">
              <input class="main-inputs" name="email" type="email" id="contact-information" />
              <label class="animated-label" for="contact-information"
                >Email Address *</label>
            </div>
            <br />

            <input hidden type="text" name="type" value="<?=$Prod->type;?>"/>
            <input hidden type="text" name="prod" value="<?=$Prod->name;?>"/>
            <input hidden type="number" name="price" value="<?=$Prod->price;?>"/>
            <input hidden type="number" name="ids" value="<?=$Prod->id;?>"/>


            <h3 class="title">Customer Information</h3>
            <div id="customer-information-container">
              <div class="input-container">
                <input class="main-inputs" type="text" name="name" id="first-name" />
                <label class="animated-label" for="first-name">First Name *</label>
              </div>
              <div class="country-select">
                <span id="arrow"></span>
                <input
                  type="text"
                  id="chosen-country"
                  class="main-inputs"
                  name="country"
                  value=""/>
                <label id="country-label" for="country-input">
                  Country / Region *
                </label>
                <div id="hidden-area">
                  <input type="search" id="search-field" />
                  <div id="country-list"></div>
                </div>
              </div>
              <div class="input-container">
                <input class="main-inputs" type="text" name="phone" id="phone" />
                <label class="animated-label" for="phone"> Phone </label>
              </div>
            </div>
            <h2 class="title">Payment</h2>
            <div id="payment-methods">
              <div class="card pay-method top">
                <input type="radio" name="payment" id="card" value="Card" checked />
                <label for="card">Pay With Debit Or Credit Card</label>
                <img src="pics/card.png" />
              </div>
              <div class="payment-description description-card">
                Pay securely via debit or credit card through Whish.
              </div>

              <div class="crypto pay-method">
                <input type="radio" name="payment" id="crypto" value="Crypto" />
                <label for="crypto">Pay With BTC /Crypto Currencies</label>
                <img src="pics/crypto.png" />
              </div>

              <div class="payment-description description-crypto">
                Pay with Bitcoin or other cryptocurrencies.
              </div>
            </div>
            <button type="submit" name="valide" id="pay-now">
              <span class="material-icons" >lock</span>
              <!-- <input type="submit" name="valide" id="valide" value="PAY NOW <?=$Prod->price;?> $"> -->
              
              <span>PAY NOW </span> <span><?=$Prod->price;?> $</span>
          </button>
          </form>
        </div>
      </div>
    </div>
</body>
</html>
