<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    

    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>تماس با پشتیبانی</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<header>
<div class="bar">
      <a class="active" href="index.php">خونه</a>
      <?php if (isset($user)): ?>
        <a class="loginandsign" href="logout.php">بیرون رفتن از اکانت</a>
        <a class="loginandsign" href="panel.php">پنل</a>
        
    <?php else: ?>
        
        <a class="loginandsign" href="login.php">ورود</a>
        <a class="loginandsign" href="signup.php">ثبت نام</a>
        
    <?php endif; ?>
   </div>
  </header>
  <div class="container">
    <h1>مشخصات پشتیبانی</h1>
    
    <p>Username: @furushvpn12</p>
    
    <p>روی این دکمه کلیک کنید تا مستقیما برید تلگرام!</p>
    <a href="https://t.me/furushvpn12" target="_blank">پروفایل تلگرام</a>
    
    <a href="index.php" class="back-button">برو به عقب</a>
  </div>
</body>
</html>