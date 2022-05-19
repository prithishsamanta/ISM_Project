<?php 

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>aes-256-cbc ENCRYPTION</title>
    <link rel="stylesheet" href="./styles.css" />
</head>

<body>
    <h1 class="search-form-header">aes-256-cbc ENCRYPTION</h1>
    <form class="search-form" autocomplete="off" action="home.php" method='post'>
        <input class="search-input" id="query-input" type="text" name="query" />
        <button class="search-button" type="submit" role="button" name='submit'>Search</button>
    </form>
    <h3 class="search-query">
        ENCRYPTED: <span id="query-output" class="query">
            <?php 
			echo "";
			if (isset($_POST['submit']))
			{
				$_SESSION["cipher"] = "aes-256-cbc";
                $_SESSION["encryption_key"] = openssl_random_pseudo_bytes(32); 
                $_SESSION["iv_size"] = openssl_cipher_iv_length($_SESSION["cipher"]); 
                $_SESSION["iv"] = openssl_random_pseudo_bytes($_SESSION["iv_size"]); 
                $data = $_POST['query'];
                $_SESSION["encrypted_data"] = openssl_encrypt($data, $_SESSION["cipher"], $_SESSION["encryption_key"], 0, $_SESSION["iv"]);
				echo $_SESSION["encrypted_data"];
			}
			?>
        </span>
    </h3>


    <center><a href="../decryption/home.php"><button class="search-button">GO TO DECRYPTION</button></a>

        <script src="./app.js"></script>
</body>

</html>