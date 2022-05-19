<html>

<head>
    <title>Your shopping website</title>
</head>

<body>
    <center>
        <h1>Buy iPhone</h1>

        <?php
                echo "<h4> Establishing Connection .... </h4>";
                $servername = "localhost";
                $usernames = "root";
                // $password = "guitar2012";
                $password = "";
            
                // Create connection
                $conn = mysqli_connect($servername, $usernames, $password);
            
                // Check connection
                if ($conn)
                {
                    echo "<h4>Connection was Established</h4>";
                    $username =  $_POST['username'];
                    $plain_password = $_POST['password'];
                    $sql = "USE credentials";
                    if ($conn->query($sql) === TRUE) {
                        echo "<h4> Using credentials </h4> ";
                    }
                    $sql = "INSERT INTO login_weak  VALUES ('$username', '$plain_password')";
                    if ($conn->query($sql) === TRUE) {
                    } else {
                        echo "Error entering values: " . $conn->error;
                    }
                }
                else echo die("Connection failed<br>".mysqli_connect_error());
            ?>
</body>

</html>