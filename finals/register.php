<?php



if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__. "/database.php";

    $sql = "INSERT INTO user (name, email, password) VALUES (?,?,?)";

    $stmt = $mysqli->stmt_init();

    if ( ! $stmt->prepare($sql)){
        die("SQL error: ". $mysqli->error);
    }

    $stmt->bind_param("sss",
                        $_POST["name"],
                        $_POST["email"],
                        $_POST["password"]);

    if ($stmt->execute()){
        $is_success = true;
        header("location: http://localhost/finals/login.php");
    }
    else{
        die($mssqli->error. " " . $mysqli->errno);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">

</head>
<body>
<header>
        <a class="reg" href="http://localhost/finals/login.php">Login</a>
    </header>


    <div>
        <form class="login-container" id="logincon" action="" method="POST">
            <h1>Register</h1>
                <label for="username">Username</label>
                <input type="text"  id="username" name="name" autocomplete="off" required>
                <label for="email">Email</label>
                <input type="text"  id="email" name="email" autocomplete="off" required>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
                <label for="Confirmpassword">Confirmpassword</label>
                <input type="password" name="Confirmpassword" id="Confirmpassword" autocomplete="off" required>
                <button >Register</button>
               
     </form>
    </div>
</body>
</html>