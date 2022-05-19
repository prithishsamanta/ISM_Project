

<html>

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="/static/login.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
    body {
        background-color: #1a202c;
    }

    @import url('https://fonts.googleapis.com/css?family=Raleway');

    body {
        margin: 0;
        padding: 0;
        font-family: 'Raleway', sans-serif;
        color: #F2F2F2;
    }

    #container-login {
        background-color: #1D1F20;
        position: relative;
        top: 20%;
        margin: auto;
        width: 340px;
        height: 445px;
        border-radius: 0.35em;
        box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    #container-register {
        background-color: #1D1F20;
        position: relative;
        top: 20%;
        margin: auto;
        width: 340px;
        border-radius: 0.35em;
        box-shadow: 0 3px 10px 0 #DCDC00;
        text-align: center;
    }

    #title {
        position: relative;
        background-color: #1A1C1D;
        width: 100%;
        padding: 20px 0px;
        border-radius: 0.35em;
        font-size: 22px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .lock {
        position: relative;
        top: 2px;
    }

    .input {
        margin: auto;
        width: 240px;
        border-radius: 4px;
        background-color: #373b3d;
        padding: 8px 0px;
        margin-top: 15px;

    }

    .input-addon {
        float: left;
        background-color: #373b3d;
        padding: 4px 8px;
    }

    input[type=checkbox] {
        cursor: pointer;
    }

    input[type=text] {
        color: #949494;
        margin: 0;
        background-color: #373b3d;
        padding: 6px 0px;
    }

    input[type=text]:focus {}

    input[type=password] {
        color: #949494;
        margin: 0;
        background-color: #373b3d;
        padding: 6px 0px;
    }

    input[type=password]:focus {}

    input[type=email] {
        color: #949494;
        margin: 0;
        background-color: #373b3d;
        padding: 6px 0px;
    }

    input[type=email]:focus {
        border: 1px solid #373b3d;
    }

    .forgot-password {
        position: relative;
        bottom: 0%;
    }

    .forgot-password a:link {
        color: #C1C3C6;
        text-decoration: none;
    }

    .forgot-password a:visited {
        color: #C1C3C6;
        text-decoration: none;
    }

    .forgot-password a:hover {
        color: #FFF;
        transition: color 1s;
    }

    .privacy {
        margin-top: 5px;
        position: relative;
        font-size: 12px;
        bottom: 0%;
    }

    .privacy a:link {
        color: #949494;
        text-decoration: none;
    }

    .privacy a:visited {
        color: #949494;
        text-decoration: none;
    }

    .privacy a:hover {
        color: #C1C3C6;
        transition: color 1s;
    }

    *:focus {
        outline: none;
    }

    .remember-me {
        margin: 10px 0;
    }

    input[type=submit] {
        padding: 6px 25px;
        background: #373E4A;
        color: #C1C3C6;
        font-weight: bold;
        border: 0 none;
        cursor: pointer;
        border-radius: 3px;
        border: 2px solid #DCDC00;
    }

    .register {
        margin: auto;
        padding: 16px 0;
        text-align: center;
        width: 85%;
        border-top: 1px solid #C1C3C6;
    }

    .clearfix {
        clear: both;
    }

    .text{
        align: center;
        position: relative;
        color: #C1C3C6;

    }

    #register-link {
        margin-top: 15px;
        padding: 6px 25px;
        background: #373E4A;
        color: #C1C3C6;
        font-weight: bold;
        border: 0 none;
        cursor: pointer;
        border-radius: 3px;
        border: 2px solid #DCDC00;
    }

    .fadeout {
        display: none;
    }
    </style>
</head>

<body>
    <div id="container-register">
        <div id="title">
            <i class="material-icons lock">lock</i> Register
        </div>

        <form method="POST" action="">
            <div class="input" style="border: 2px solid #DCDC00;">
                <div class="input-addon">
                    <i class="material-icons">email</i>
                </div>
                <input id="Enter a Username" placeholder="Enter a Username" type="text" required class="validate"
                    autocomplete="off" name="username" style="border: none;">
            </div>


            <div class="input" style="border: 2px solid #DCDC00;">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="password" placeholder="Enter a Password" type="password" required class="validate"
                    autocomplete="off" name="password" style="border: none;">
            </div><br><br>

            <input type="submit" value="Register" name="SubmitButton" style="border: 2px solid #DCDC00;" />
        </form>

        <?php
            $message = "";
            if(isset($_POST['SubmitButton'])){ 
                echo '<center><h5 class="text"> You Have Registered Succesfully!! Please Login Again </h5><br>';

                // echo "<h4> Establishing Connection .... </h4>";
                $servername = "localhost:3308";
                $usernames = "root";
                $password = "";
            
                // Create connection
                $conn = mysqli_connect($servername, $usernames, $password);
            
                // Check connection
                if ($conn)
                {
                    // echo "<h4>Connection was Established</h4>";
                    $username =  $_POST['username'];
                    $plain_password = $_POST['password'];
                    $hash = password_hash($plain_password, PASSWORD_DEFAULT);
                    $password = $hash;
                    // echo "encrypted password: ".$password;
                    $sql = "USE credentials";
                    if ($conn->query($sql) === TRUE) {
                        //echo "<h4> Using credentials </h4> ";
                    }
                    $sql = "INSERT INTO login  VALUES ('$username', '$password')";
                    if ($conn->query($sql) === TRUE) {
                    } else {
                        //echo "Error entering values: " . $conn->error;
                    }
                }
                else echo die("Connection failed<br>".mysqli_connect_error()); 

                echo $_SERVER['REQUEST_TIME'];
            }   
        ?>

        <div class="register">
            Do you already have an account?
            <a href="./login.php"><button id="register-link" style="border: 2px solid #DCDC00;">Log In
                    here</button></a>
        </div>
    </div>

    <script>
    document.querySelector('#checkbox').addEventListener('click', () => {
        document.querySelector('#checkbox').checked = true;
    })
    </script>
</body>

</html>