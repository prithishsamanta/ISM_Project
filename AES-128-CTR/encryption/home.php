<?php 

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AES-128-CTR ENCRYPTION</title>
    <link rel="stylesheet" href="./styles.css" />
</head>

<body>
    <h1 class="search-form-header">AES-128-CTR ENCRYPTION</h1>
    <form class="search-form" autocomplete="off" action="home.php" method='post'>
        <input class="search-input" id="query-input" type="text" name="query" />
        <button class="search-button" type="submit" role="button" name='submit'>Search</button>
    </form>
    <h3 class="search-query">
        ENCRYPTED: <span id="query-output" class="query">
            <?php 
			if (isset($_POST['submit']))
			{
                $data = $_POST['query'];
				$ciphering = "AES-128-CTR";
                $iv_length = openssl_cipher_iv_length($ciphering);
                $options = 0;
                $_SESSION['encryptionIv'] = rand(1000000000000000, 9999999999999999);
                // $encryption_iv = '1234567891011121';
                $_SESSION['encryptionKey'] = rand(0, 10000000);
                $encryption_key = "ILoveVIT";
                $encryption = openssl_encrypt($data, $ciphering, $_SESSION['encryptionKey'], $options, $_SESSION['encryptionIv']);
                echo $encryption;
                setcookie('product_price', $encryption);
			}
			?>
        </span>
    </h3>


    <center><a href="../decryption/home.php"><button class="search-button">GO TO DECRYPTION</button></a>

        <script src="./app.js"></script>
</body>

</html>