<?php 

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DES-EDE3 ENCRYPTION</title>
    <link rel="stylesheet" href="./styles.css" />
</head>

<body>
    <h1 class="search-form-header">DES-EDE3 ENCRYPTION</h1>
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
                $_SESSION['data'] = $data;
                $secret = hash("sha256", $data, false);
                $encData = openssl_encrypt($data, 'DES-EDE3', $secret, OPENSSL_RAW_DATA);
                $encData = base64_encode($encData);
                echo $encData;
                setcookie('temp_price', $encData);
			}
			?>
        </span>
    </h3>


    <center><a href="../decryption/home.php"><button class="search-button">GO TO DECRYPTION</button></a>

        <script src="./app.js"></script>
</body>

</html>