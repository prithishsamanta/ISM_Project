<html>

<head>
    <title>Your shopping website</title>
</head>
<center>
    <h2 align="center"> Buy iPhone</h2>
    <?php
		session_start();
		$_SESSION["decrypted_data"] = openssl_decrypt($_SESSION["encrypted_data"], $_SESSION["cipher"], $_SESSION["encryption_key"], 0, $_SESSION["iv"]);
		echo "Thanks for Choosing iPhone X <br/>";
		echo "Quantity: 1 <br/>";
		echo "The Price for this product is ".$_SESSION["decrypted_data"];
	?>
</center>

</html>