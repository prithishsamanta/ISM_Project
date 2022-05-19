<?php
    session_start();
    if(!isset($_POST['addbut'])){
        $_SESSION["name"] = $_POST["username"];
    }
    else{
        
        $price =  $_POST['price'];
        $color = $_POST['color'];
        $data_select = $price;

        if($price == '32GB'){
            $price = 48000;
        }
        else if($price == '64GB'){
            $price = 56000;
        }
        else if($price == '128GB'){
            $price = 70000;
        }
        else if($price == '256GB'){
            $price = 84000;
        }
        ini_set('display_errors','Off');

        //Triple DES encryption code 
        error_reporting(E_ERROR | E_PARSE);
        $data_sec = 100000;
        $secret = hash("sha256", $data_sec, false);
        $encData = openssl_encrypt($price, 'DES-EDE3', $secret, OPENSSL_RAW_DATA);
        $encData = base64_encode($price);
        setcookie('temp_price', $encData);
   
        // //Triple DES encryption code 
        // error_reporting(E_ERROR | E_PARSE);
        // //Message to be encrypted
        // $data = $price;

        // //Generates a keyed hash value using the HMAC method
        // $secret = hash("sha256", $data, false);
        
        // //The openssl_encrypt() function is used to encrypt the data.
        // $encData = openssl_encrypt($data, 'DES-EDE3', $secret, OPENSSL_RAW_DATA);

        // //Encodes the given string with base64.

        // //This encoding is designed to make binary data survive transport through transport layers that are not 8-bit clean.
        // $encData = base64_encode($encData);
        // setcookie('temp_price', $encData);
        

        //AES encryption code 

        //cipher method from a list of cipher methods
        $ciphering = "AES-128-CTR";

        //used to get the cipher initialization vector (iv) length
        $iv_length = openssl_cipher_iv_length($ciphering);
        //It is a bitwise disjunction of the 2 flags 
        $options = 0;

        $_SESSION['encryptionIv'] = rand(1000000000000000, 9999999999999999);
        // $encryption_iv = '1234567891011121';
        $_SESSION['encryptionKey'] = rand(0, 10000000);
        
        $encryption_key = "ILoveVIT";

        //The openssl_encrypt() function is used to encrypt the data.
        $encryption = openssl_encrypt($price, $ciphering, $_SESSION['encryptionKey'], $options, $_SESSION['encryptionIv']);
        setcookie('product_price', $encryption);
    }
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your shopping website</title>
</head>

</html>

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

    <?php
        //echo "<h4> Establishing Connection .... </h4>";
        $servername = "localhost:3308";
        $usernames = "root";
        $password = "";
            
        // Create connection
        $conn = mysqli_connect($servername, $usernames, $password);
            
        // Check connection
        if ($conn)
        {
            //echo "<h4>Connection was Established</h4>";
            $username =  $_POST['username'];
            $password = $_POST['password'];
            $sql = "USE credentials";
            if ($conn->query($sql) === TRUE) {
            }
            $result = mysqli_query($conn, "SELECT PASSWORD FROM LOGIN WHERE USERNAME='$username'");
            
            if ($conn->query($sql) === TRUE) {
                while ($row = mysqli_fetch_array($result))
                {
                    $given_password = $row[0];
                }
                $verify = password_verify($password, $given_password);
                if ($verify) {
                    
                    echo '<h2 class="text" >Hello '.$_SESSION["name"].'!! </h2><br>';

                    echo '
                    <div class="main">
                    <div class="center">
                        <div class="container">
                            <div>
                                <h1>Latest iPhone 13</h1><br><br>
                            </div>
                            <div class="text_container">
                                <h2>About iPhone 13</h2><br>
                                <p> The iPhone 13 and iPhone 13 Mini were launched on the 14th of September and are Apple\'s newest
                                    and cheapest
                                    flagship iPhones, along with the costly iPhone 13 Pro and iPhone 13 Pro Max. For those who do
                                    not have pro-level camera
                                    features, the iPhone 13 and iPhone 13 mini are ideal. <br><br></p>
            
                                
                            </div>
            
                            <div class="text_container">
                                <h2>Specifications</h2> <br>
                                <ul>
                                    <li>Comes in 3 storage capacities: 128GB, 256GB and 512GB</li><br>
                                    <li>Weight: 173 grams (6.10 ounces)</li><br>
                                    <li>Chip: A15 Bionic chip, New 6‑core CPU with 2 performance and 4 efficiency cores, New 4‑core
                                        GPU, New 16‑core Neural Engine</li><br>
                                    <li>Camera: Dual 12MP camera system: Wide and Ultra Wide cameras, Wide: ƒ/1.6 aperture, Ultra
                                        Wide: ƒ/2.4 aperture and 120° field of view</li><br>
                                    <li>Video Recording: Cinematic mode for recording videos with shallow depth of field, HDR video
                                        recording with Dolby Vision up to 4K at 60 fps</li><br>
                                </ul>
                            </div>
                            <br>

                            <div class="text_container">
                                <img src="./iphone13.jpg"
                                    alt="iPhone 13 Pic" width="565" height="350">
                            </div>

                            <br>
                            <div class="text_container">
                                <h2>Is Iphone 13 worth buying?</h2><br>
                                <p>
                                    Yes, updates are available, but small and incremental. When you run an iPhone 11, one of the
                                    models in
                                    this range is certainly worth upgrading the iPhone 13, yes. The iPhone 13 is not an overwhelming
                                    update of
                                    the iPhone 12, but it\'s a BIG update of the iPhone 11.
                                </p>
                            </div>
                            <br>

                            <div class="box">
                            <div class="box-pad">
                                <form action="" method="post">
                                    <div class="text_container">
                
                                        <h4>1. Memory Size: </h4>

                                        <label for="price" class="left">
                                            <input type="text" list="price" class="dropdown" name="price" placeholder="Select The Memory Size Required" required>
                                            <datalist id="price" name="price">
                                                <option value="32GB"> 32GB - 48000Rs </option>
                                                <option value="64GB"> 64GB - 56000Rs </option>
                                                <option value="128GB"> 128GB - 70000Rs </option>
                                                <option value="256GB"> 256GB - 84000Rs </option>
                                            </datalist>
                                        </label><br>
                                        
                                        <br><br><h4>2. Color: </h4>

                                        <label for="color" class="left">
                                            <input type="text" list="color" class="dropdown" name="color" placeholder="Select The Color" required>
                                            <datalist id="color" name="color">
                                                <option value="Red"> Red </option>
                                                <option value="Black"> Black </option>
                                                <option value="White"> White </option>
                                                <option value="Blue"> Blue </option>
                                            </datalist>
                                        </label><br>   
                
                                        <br>
                                        <div class="center">
                                            <input class="box-button" type="submit" name="addbut" value="ADD TO CART">
                                        </div>
                                    </div>
                            
                                </form>
                            </div>
                            </div>';

                            $message = "";
                            if(isset($_POST['addbut'])){ 
                                echo '<br><center><h4> Your Product Has Been Added to the Cart <br> Click The Below Button To Proceed With the Payments </h4><br>';
                              
                                echo '<h3>Item Selested is </h3><br>';
                                echo '<h4>1. Memory: '.$data_select.' </h2>';
                                echo '<h4>2. Color: '.$color.' </h2><br>';
                                
                            }
                            echo '

                            <form action="form_submit.php" method="post">
                                <div class="text_container">
                                    <div class="center">
                                        <input class="button" type="submit" name="submit" value="CLICK TO BUY">
                                    </div>
                                </div>
                            </form>
            
                    </div>
                </div>
            
                </div>';

                } else {
                    echo '<h2 class="text"> INCORRECT USERNAME OR PASSWORD! </h2>';
                }
            } else {
                echo '<h2 class="text"> Error entering values: </h2>' . $conn->error;
            }
        }
        else echo die("<h2> Connection failed<br> </h2>".mysqli_connect_error());
    ?>
</body>

</html>