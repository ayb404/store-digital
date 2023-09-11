<?php
$my_email ="ayoubaqarrout1@gmail.com" ;
$return_to ="http://yourwebsite.com/returnto" ;
$notify_page ="http://yourwebsite.com/notify_page.php" ;
$custom = "example";
?>

<form action="https://spaceremit.com/apipay/" method="POST" accept-charset="utf-8" >
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="<?php echo htmlspecialchars( $my_email); ?>">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="item_name" value="Recharge">
    <input type="hidden" name="return" value="<?php echo htmlspecialchars( $return_to); ?>">
    <input type="hidden" name="notify_url" value="<?php echo htmlspecialchars( $notify_page); ?>">
    <input type="hidden" name="custom" value="<?php echo htmlspecialchars( $custom );?>">

    <input type="hidden" name="sp_api_skip_register" value="true">
    <input type="text" name="sp_api_user_fullname">
    <input type="email" name="sp_api_user_email">

    <input type="number" name="amount" id="payPrice" required="required" />
    <input type="submit" id="pay" value="pay"/>

</form>

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
//payment invalid
}

} ?>