<?php
$con=mysqli_connect("localhost","root","","ecom");
session_start();
$cus_email=$_SESSION['cus_email'];
$select_customer="select * from customers where cus_email='$cus_email'" ;
$run_customer=mysqli_query($con,$select_customer);
$row=mysqli_fetch_array($run_customer);
$cus_id=$row['cus_id'];
?>
<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	if(isset($_POST["ORDERID"],$_POST["STATUS"],$_POST["TXNAMOUNT"],$_POST["TXNID"],$_POST["BANKNAME"],$_POST["BANKTXNID"],$_POST["TXNDATE"],$_POST["GATEWAYNAME"])){
		$order_id=$_POST["ORDERID"];
		$status=$_POST["STATUS"];
		$tra_amount=$_POST["TXNAMOUNT"];
		$tra_id=$_POST["TXNID"];
		$bank_name=$_POST["BANKNAME"];
		$bank_traid=$_POST["BANKTXNID"];
		$date=$_POST["TXNDATE"];
		$gateway=$_POST["GATEWAYNAME"];
		$query="insert into paytm_payment(order_id,transaction_id,transaction_amount,cus_id,transaction_date,status,gateway_name,banktxn_id,bank_name)
		values('$order_id','$tra_id','$tra_amount','$cus_id','$date','$status','$gateway','$bank_traid','$bank_name')";
		$run=mysqli_query($con,$query);
		if($run){
		echo "<script>alert('Transaction Sucessfull')</script>";
	
		}

		
		

	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
			echo"<a href='../../customer/my_account.php?my_order'>
			<button class='btn btn-default' type='sumbit' name='Back' value='Back'>
Back
</button></a>";
}
}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>