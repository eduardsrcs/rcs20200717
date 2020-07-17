<?php
  session_start();
  if(isset($_SESSION['login'])) {
    unset($_SESSION['login']);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login page</title>
  <style>
    *{
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }
    body{
      background-image: linear-gradient(#cce, #226);
      background-repeat: no-repeat;
      min-height: 100vh;
    }
    .mymodal{
      background-color: aliceblue;
      width: 300px;
      height: 200px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-shadow: 1px 1px 6px #777;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    .mymodal input{
      display: block;
      width: 220px;
      margin: 10px auto;
      text-align: center;
      color: green;
    }
    .mymodal h2{
      margin-top: 40px;
      text-align: center;
    }
  </style>
</head>
<body>
    <div class="mymodal">
      <h2>Login</h2>
      <form action="getLogin.php" method="POST">
        <input type="text" name="login">
        <input type="password" name="password">
        <input type="submit" value="Login">
      </form>
    </div>
</body>
</html>