<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AES-128-CTR DECRYPTION</title>
    <link rel="stylesheet" href="./styles.css" />
</head>

<body>
    <h1 class="search-form-header">AES-128-CTR DECRYPTION</h1>
    <form class="search-form" autocomplete="off" action="home.php" method='post'>
        <input class="search-input" id="query-input" type="text" name="query" />
        <button class="search-button" type="submit" role="button" name='submit'>Search</button>
    </form>
    <h3 class="search-query">
        DECRYPTED: <span id="query-output" class="query">
            <?php 
			if (isset($_POST['submit']))
			{
                $data = $_POST['query'];
				$ciphering = "AES-128-CTR";
                $options = 0;
                $decryption_iv = $_SESSION['encryptionIv'];
                $decryption_key = $_SESSION['encryptionKey'];
                $decryption=openssl_decrypt ($data, $ciphering, $decryption_key, $options, $decryption_iv);
                echo $decryption;
			}
			?>
        </span>
    </h3>
    <center><a href="../encryption/home.php"><button class="search-button">GO TO ENCRYPTION</button></a>
    </center>

    <script src="./app.js"></script>
</body>

</html>