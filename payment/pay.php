
<?php
$servername="localhost";
$username="goldqkyo_gold";
$password="axp-p99/112358";
$db="goldqkyo_goldshop";


// Create connection
$con= new PDO("mysql:host=$servername;dbname=$db",$username,$password);

if(isset($_POST['valide'])){
  try{
    $reqinsert="insert into `orders` values(null,'".$_POST['sp_api_user_fullname']."','".$_POST['sp_api_user_email']."','".$_POST['phone']."','".$_POST['country']."','".$_POST['payment']."','".$_POST['prod']."','".$_POST['type']."','".$_POST['price']."',CURRENT_TIMESTAMP(),0)";
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


$my_email ="ayoubaqarrout1@gmail.com" ;
$return_to ="https://goldpers.com/Sixteen" ;
$notify_page ="http://yourwebsite.com/notify_page.php" ;
$custom = "example";

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
                <th >Product</th>
                <th class="align-right">Total</th>
              </tr>
            </thead>
            
            <tfoot>
              <tr>
                <td ><?=$Prod->name;?></td>
                <td class="align-right "><?=$Prod->price;?> $</td>
              </tr>
            </tfoot>
          </table>

          <h3 class="title">Contact Information</h3>

          <form action="https://spaceremit.com/apipay/" method="post"  accept-charset="utf-8" >

            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="<?php echo htmlspecialchars( $my_email); ?>">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="item_name" value="Recharge">
            <input type="hidden" name="return" value="<?php echo htmlspecialchars( $return_to); ?>">
            <input type="hidden" name="notify_url" value="<?php echo htmlspecialchars( $notify_page); ?>">
            <input type="hidden" name="custom" value="<?php echo htmlspecialchars( $custom );?>">
            <input type="hidden" name="sp_api_skip_register" value="true">

            <div class="input-container">
              <input class="main-inputs" name="sp_api_user_email" type="email" id="contact-information" />
              <label class="animated-label" for="contact-information" >Email Address *</label>
            </div>
            <br/>

            <input hidden type="text" name="type" value="<?=$Prod->type;?>"/>
            <input hidden type="text" name="prod" value="<?=$Prod->name;?>"/>
            <input hidden type="number" name="price" value="<?=$Prod->price;?>"/>
            <input hidden type="number" name="ids" value="<?=$Prod->id;?>"/>
            <input hidden type="number" name="amount" id="payPrice" value="<?=$Prod->price;?>" required="required" />

            <div id="customer-information-container">
              <div class="input-container">
                <input class="main-inputs" type="text" name="sp_api_user_fullname" id="first-name" />
                <label class="animated-label" for="first-name">First Name *</label>
              </div>
              <div class="country-select">
                <span id="arrow"></span>
                <input type="text" id="chosen-country" class="main-inputs" name="country" value=""/>
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


<?php
if(!empty($_POST["sender_email"]) && !empty($_POST["reciver_email"]) && !empty($_POST["payment_code"]) && !empty($_POST["total_amount"]) && !empty($_POST["date"]) && !empty($_POST["tax"]) && !empty($_POST["status"]) ){

$myarrayy = $_POST ;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://spaceremit.com/api/");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($myarrayy));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close ($ch);

if ($server_output == "VALID_PAYMENT") {

//do some thing ,this is real payment
echo "OK ";


}else {
echo "payment invalid";
}

} ?>