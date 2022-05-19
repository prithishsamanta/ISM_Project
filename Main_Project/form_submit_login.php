<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
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

    center {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 10%;
        padding-top: 35%;
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
        height: 420px;
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
        margin-top: 40px;
        width: 85%;
        border-top: 1px solid #C1C3C6;
    }

    .clearfix {
        clear: both;
    }

    #register-link {
        margin-top: 10px;
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
        <center>
            <?php
                echo "<h4> Establishing Connection .... </h4>";
                $servername = "localhost:3308";
                $usernames = "root";
                $password = "";
            
                // Create connection
                $conn = mysqli_connect($servername, $usernames, $password);
            
                // Check connection
                if ($conn)
                {
                    echo "<h4>Connection was Established</h4>";
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
                            echo 'LOGIN SUCCESSFUL!';
                        } else {
                            echo 'INCORRECT USERNAME OR PASSWORD!';
                        }
                    } else {
                        echo "Error entering values: " . $conn->error;
                    }
                }
                else echo die("Connection failed<br>".mysqli_connect_error());
            ?>
        </center>
        <script>
        document.querySelector('#checkbox').addEventListener('click', () => {
            document.querySelector('#checkbox').checked = true;
        })
        </script>
</body>

</html>