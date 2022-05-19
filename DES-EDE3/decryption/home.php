<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DES-EDE3 DECRYPTION</title>
    <link rel="stylesheet" href="./styles.css" />
</head>

<body>
    <h1 class="search-form-header">DES-EDE3 DECRYPTION</h1>
    <form class="search-form" autocomplete="off" action="home.php" method='post'>
        <input class="search-input" id="query-input" type="text" name="query" />
        <button class="search-button" type="submit" role="button" name='submit'>Search</button>
    </form>
    <h3 class="search-query">
        DECRYPTED: <span id="query-output" class="query">
            <?php 
			if (isset($_POST['submit']))
			{
				$data = $_SESSION['data'];
                $secret = hash("sha256", $data, false);
                $data = base64_decode($_POST['query']);
                $decData = openssl_decrypt($data, 'DES-EDE3', $secret, OPENSSL_RAW_DATA);
                echo $decData;
			}
			?>
        </span>
    </h3>
    <center><a href="../encryption/home.php"><button class="search-button">GO TO ENCRYPTION</button></a>
    </center>

    <script src="./app.js"></script>
</body>

</html>