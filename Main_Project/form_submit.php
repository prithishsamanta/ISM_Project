<?php
	session_start();
	$data_sec = 100000;
	$secret = hash("sha256", $data_sec, false);
	$data = base64_decode($_COOKIE["temp_price"]);
	$decData = openssl_decrypt($data, 'DES-EDE3', $secret, OPENSSL_RAW_DATA);
	
	// //Decodes a base64 encoded string.
	// $data = base64_decode($_COOKIE["temp_price"]);
	// $secret = hash("sha256", $data, false);

	// //The openssl_decrypt() function is used to decrypt the data.
	// $decData = openssl_decrypt($data, 'DES-EDE3', $secret, OPENSSL_RAW_DATA);


	$ciphering = "AES-128-CTR";
	$options = 0;
	$decryption_iv = $_SESSION['encryptionIv'];
	$decryption_key = $_SESSION['encryptionKey'];

	
	$decryption=openssl_decrypt ($_COOKIE["product_price"], $ciphering, $decryption_key, $options, $decryption_iv);
?>

<html>

<head>
    <title>Your shopping website</title>
</head>

<body>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Raleway', sans-serif;
        color: #F2F2F2;
        text-align: center;
        background-image: url('./Background.jpg');
        background-size: cover;
        /* background-repeat: no-repeat; */
    }

    .head {
        background-color: grey;
        color: #66FCF1;
        height: 70px;
        padding: 10px 0px 5px 0px;
        margin: 10px opx 1opx 0px;
    }

    .text{
        font-size: 25px;
        align: center;
        position: relative;
        top: 20px;
        color: grey;

    }

    .box{
        color: #F5F5F5;
        font-weight: bold;
        width: 600px;
        text-align: justify;
        margin-bottom: 20px;
        padding: 0px 40px 0px 40px;
        margin-top: 20px;
        background-color: #202020;
        border-radius: 0.35em;
        font-size: 16px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .box-text{
        margin: 0px 10px 0px 10px;
    }


    .box-button{
        border-radius: 5px;
        background-color: #101010;
        font-weight: bold;
        margin-bottom: 5px;
        font-size: 14px;
        color: #E6E6FF;
        width: 115px;
        height: 32px;
        border: 2px solid #FFFFFF;
    }

    .box-button:hover {
        width: 120px;
        height: 35px;
        margin-bottom: 2px;
        color: black;
        background-color: grey;
        border-radius: 5px;
    }

    .dropdown {
        border-radius: 5px;
        background-color: White;
        width: 228px;
        height: 28px;
    }

    .dropdown:hover {
        border-radius: 5px;
        background-color: #E8E8E8;
        width: 230px;
        height: 28px;
    }

    .container {
        width: 800px;
        text-align: justify;
        background-color: black;
        padding: 40px 40px 40px 40px;
        margin-bottom: 20px;
        margin-top: 50px;
        border-radius: 0.35em;
        box-shadow: 0 3px 10px 0 #DCDC00;
        font-size: 16px;
        /* box-shadow: 0 30px 30px rgba(0, 0, 0, 0.20), 0 15px 15px rgba(0, 0, 0, 0.43); */
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .center {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .text_container {
        width: 625px;
        padding: 20px 30px 20px 30px;
        border: 1px dotted black;
        border-radius: 5px;
    }

    .pad {
        padding-left: 40px;
    }

    .left{
        position: relative;
        left: 10px;
        top: 10px;
    }

    .button {
        border-radius: 5px;
        background-color: #101010;
        font-weight: bold;
        margin-bottom: 5px;
        font-size: 14px;
        color: #E6E6FF;
        width: 115px;
        height: 32px;
        border: 2px solid;
    }

    .button:hover {
        width: 120px;
        height: 35px;
        margin-bottom: 2px;
        color: black;
        background-color: grey;
        border-radius: 5px;
    }
    </style>

	<div class="main">
		<div class="center">
			<div class="container">
				<center>
					<h2 align="center"> Buy iPhone</h2>
					<?php
						if ($data == $decryption)
						{			
							echo "<br>Thanks for Choosing iPhone 13 <br/>";
							echo "Quantity: 1 <br/>";
							echo "The Price for this product is ".$decryption;
							echo '
							
							<form action="payments.php" method="post">
								<div class="text_container">
									<h4> Click Continue, to Proceed with Further Payments </h4><br>
									<div class="center">
										<input class="button" type="submit" name="submit" value="CONTINUE">
									</div>
								</div>
							</form>
							';
						}
						else
						{
							echo '<br>
								<form action="login.php" method="post">
									<div class="text_container">
										<h4> The Data Was Tampered </h4><br>
										<h4> Please Logout </h4><br>
										<div class="center">
											<input class="button" type="submit" name="submit" value="LOGOUT">
										</div>
									</div>
								</form>
								';
							session_destroy();
							
						}
					?>
				</center>
			</div>
		</div>
	</div>
</body>


</html>