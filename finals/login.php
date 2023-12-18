<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__. "/database.php";

    $sql = sprintf("SELECT * FROM user
            WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);
    session_start();

    $user = $result->fetch_assoc();

    if ($user) {
       if ( $_POST["password"] == $user["password"]){

        session_start();

        $_SESSION["user_id"] = $user["id"];

        header("Location: home.html");

       } 
    }

    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <script src="java.js"></script>
<body>
    <header>
        <a class="reg" href="register.php">Register</a>
    </header>
    <div>
        <form class="login-container" id="logincon" method="post">
            <h1>LOGIN</h1>
                <label for="email">Username</label>
                <input type="text"  id="email" name="email" autocomplete="off" required placeholder="USERNAME">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="off" required placeholder="PASSWORD">
                <button onclick="Nowlogin()">Login</button>
               
            </form>
        </div>
        <div class="andales">
            <img src="" alt="">
     </div>
    </head>
 </body>
</html>