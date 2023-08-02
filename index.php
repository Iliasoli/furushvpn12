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
<?php

require __DIR__ . "/database.php";

$sql = "SELECT stats FROM user";
$result = $mysqli->query($sql);
$os = php_uname('s');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Home</title>

  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>


<style>
@media (max-width: 768px) {
  body {
    background-image: url("background-android.jpg");
  }
}
@media all {
  body {
font-family: Arial, sans-serif;
margin: 0;
padding: 0;
background-image: url("background.jpg");
background-size: cover;
  }
}
.bar a.title {
  display: flex;
  justify-content: center;
  color: white;
  background-color: #333333;
  font-size: 0.6cm;
}
</style>
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
  
  <main>
    <div class="product">
      <h2>پلن یک. تک کاربره</h2>
      <p>قیمت: 10 هزار تومان / ماه</p>
<button class="buy-button" onclick="location.href='custom.php';">خرید</button>
    </div>
    
    <div class="product">
      <h2>پلن دو. تک کاربره</h2>
      <p>قیمت: 15 هزار تومان / سه ماه</p>
      <button class="buy-button" onclick="location.href='custom.php';">خرید</button>
    </div>
    
    <div class="product">
      <h2>پلن سه. تعداد یوزر دلخواه</h2>
      <p>برای دیدن قیمت  دکمه زیر را بزنید</p>
<a class="custom-button" onclick="location.href='custom.php';">دیدن قیمت</a>

    </div>
  </main>

  <div class="product">
    <h2>پلن چهار. چهار کاربره</h2>
    <p>قیمت: 20 هزار تومان / ماه</p>
    <button class="buy-button">خرید</button>
  </div>
</main>

<div class="product">
  <h2>پلن پنج. چهار کاربره</h2>
  <p>قیمت: 25 هزار تومان / سه ماه</p>
  <button class="buy-button">خرید</button>
</div>
</main>



  <script src="script.js"></script>
</body>
</html>

    
    
    
    
    
    
    
    