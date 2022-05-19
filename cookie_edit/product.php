<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();
        $_SESSION["cipher"] = "aes-256-cbc";
        $_SESSION["encryption_key"] = openssl_random_pseudo_bytes(32); 
        $_SESSION["iv_size"] = openssl_cipher_iv_length($_SESSION["cipher"]); 
        $_SESSION["iv"] = openssl_random_pseudo_bytes($_SESSION["iv_size"]); 
        $data = '100000';
        $_SESSION["encrypted_data"] = openssl_encrypt($data, $_SESSION["cipher"], $_SESSION["encryption_key"], 0, $_SESSION["iv"]);
        setcookie('product_price', $_SESSION["encrypted_data"]);
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
        background-image: url('https://raw.githubusercontent.com/prithishsamanta/Infosec-project/master/Background.png');
        color: #E6E6FF;
        text-align: center;
    }

    .head {
        background-color: grey;
        color: #66FCF1;
        height: 70px;
        padding: 10px 0px 5px 0px;
        margin: 10px opx 1opx 0px;
    }

    .container {
        width: 800px;
        text-align: justify;
        background-color: black;
        padding: 40px 40px 40px 40px;
        margin-bottom: 20px;
        margin-top: 50px;
        border: 5px solid #6B6B6B;
        border-radius: 5px;
        font-family: monospace;
        font-size: 16px;
        box-shadow: 0 30px 30px rgba(0, 0, 0, 0.20), 0 15px 15px rgba(0, 0, 0, 0.43);
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

    .button {
        border-radius: 5px;
        background-color: #3D4D42;
        font-family: monospace;
        margin-bottom: 5px;
        font-size: 14px;
        color: #E6E6FF;
        width: 110px;
        height: 32px;
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
                <div>
                    <h1>Latest iPhone 13</h1><br><br>
                </div>
                <div class="text_container">
                    <h2>About iPhone 13</h2><br>
                    <p> The iPhone 13 and iPhone 13 Mini were launched on the 14th of September and are Apple's newest
                        and cheapest
                        flagship iPhones, along with the costly iPhone 13 Pro and iPhone 13 Pro Max. For those who do
                        not have pro-level camera
                        features, the iPhone 13 and iPhone 13 mini are ideal. <br><br></p>

                    <!-- <iframe width="565" height="454"
                        src="https://www.youtube.com/embed/XKfgdkcIUxw?autoplay=1&mute=1&controls=0"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe> -->
                </div>

                <div class="text_container">
                    <img src="https://raw.githubusercontent.com/prithishsamanta/Infosec-project/master/iphone13.jpg"
                        alt="iPhone 13 Pic" width="565" height="350">
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
                <br><br>
                <div class="text_container">
                    <h2>Is Iphone 13 worth buying?</h2><br>
                    <p>
                        Yes, updates are available, but small and incremental. When you run an iPhone 11, one of the
                        models in
                        this range is certainly worth upgrading the iPhone 13, yes. The iPhone 13 is not an overwhelming
                        update of
                        the iPhone 12, but it's a BIG update of the iPhone 11.
                    </p>
                </div>
                <br><br>
                <form action="form_submit.php" method="post">
                    <div class="text_container">

                        <h2>Price of iPhone 13</h2><br>

                        <p>
                            The iPhone 13 is priced at $100,000.
                        </p>

                        <!-- <select name="price" id="price">
                            <option value="70000" onclick="selected()">iphone 13 with 64 GB memory - 70,000 Rs</option>
                            <option value="90000" onclick="selected()">iphone 13 with 128 GB memory - 90,000 Rs</option>
                            <option value="110000" onclick="selected()">iphone 13 with 256 GB memory - 110,000 Rs
                            </option>
                        </select> -->
                        <br><br>
                        <p>
                            Click here to buy the new iPhone 13.
                        </p> <br><br>
                        <br>
                        <div class="center">
                            <input class="button" type="submit" name="submit" value="Click to Buy">
                        </div>
                    </div>
            </div>
            </form>

        </div>
    </div>

    </div>
</body>

</html>