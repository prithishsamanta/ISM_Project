<?php

session_start();

?>

<html>

<head>
    <title>Your shopping website</title>
</head>

<body>
    <center>
        <h2 align="center"> Buy iPhone</h2>
        <?php
			$data = "100000";
			$secret = hash("sha256", $data, false);

			//Decodes a base64 encoded string.
			$data = base64_decode($_COOKIE["temp_price"]);
			
			//The openssl_decrypt() function is used to decrypt the data.
			$decData = openssl_decrypt($data, 'DES-EDE3', $secret, OPENSSL_RAW_DATA);
			
			$ciphering = "AES-128-CTR";
			$options = 0;
			$decryption_iv = $_SESSION['encryptionIv'];
			$decryption_key = $_SESSION['encryptionKey'];

			//The openssl_decrypt() function is used to decrypt the data.
			$decryption=openssl_decrypt ($_COOKIE["product_price"], $ciphering, $decryption_key, $options, $decryption_iv);
			
			if ($decData == $decryption)
			{			
				echo "Thanks for Choosing iPhone X <br/>";
				echo "Quantity: 1 <br/>";
				echo "The Price for this product is ".$decryption;
			}
			else
			{
				echo "YOU CHANGED THE COOKIE!";
				echo "<br><a href='./product.php'>Go Back</a>";
			}
		?>
    </center>
</body>


</html>