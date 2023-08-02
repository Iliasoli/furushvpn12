<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}
session_start();
?>
<?php


if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    

    $user = $result->fetch_assoc();
}

?>
<?php

require __DIR__ . "/database.php";

$sql = "SELECT stats FROM user";
$result = $mysqli->query($sql);


?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<header>
   <div class="bar">
      <a class="active" href="index.php">Home</a>
      <?php if (isset($user)): ?>
        
        <a class="loginandsign" href="login.php">Login</a>
        <a class="loginandsign" href="signup.php">Signup</a>
        
    <?php else: ?>
        
        <a class="loginandsign" href="login.php">Login</a>
        <a class="loginandsign" href="signup.php">Signup</a>
        
    <?php endif; ?>
   </div>
  </header>
  <style>
    .bar {
  background-color: #333;
  overflow: hidden;
}

.bar a {
  float: right;
  display: block;
  color: #fff;
  text-align: center;
  padding: 12px 20px;
  text-decoration: none;
  font-size: 17px;
  background-color: #2573ac;
}

.bar a.loginandsign:hover {
  background-color: #ddd;
  color: black;
}

.bar a.active {
  background-color: #4CAF50;
  color: white;
}
.bar a.title {
  margin-right: 12cm;
  margin-left: 10cm;
  font-size: 26px;
  background-color: #333;
  color: #ddd;
}
@font-face {
  font-family: 'Shabnam';
  src: url('Shabnam.ttf') format('truetype');
}
.noacc,#noacc {
  font-family: 'Shabnam', Arial, sans-serif;
}
  </style>
  <h1 class="noacc">ورود</h1>
    
    <?php if ($is_invalid): ?>
        <em>ورود اشتباه!</em>
    <?php endif; ?>
    
    <form method="post">
        <label for="email" class="noacc">ایمیل</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password" class="noacc">پسورد</label>
        <input type="password" name="password" id="password">
        
        <button class="noacc" >ورود</button>
    </form>
    <button class="noacc" onclick="window.location.href='signup.php'">اکانت ندارید؟ اینجا کلیک کنید</button>

</body>
</html>




