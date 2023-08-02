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
  <title>پلن سفارشی</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script src="script.js"></script>
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
    <h1>پلن سفارشی</h1>
    
    <form id="customPlanForm">
      <label for="userCount">تعداد یوزر را وارد کنید</label>
      <input type="text" id="userCount" placeholder="e.g., 1 Month" required>
      <br>
      <button type="button" class="show-price" onclick="calculatePrice()">قیمت را نشان بده</button>
    </form>
    
    <div id="priceOutput"></div>
    
    <a href="index.php" class="back-button">برو عقب</a>
    <a href="contacts.php" class="buy-button">برو قسمت یوزرنیم</a>
  </div>

  <script>
function calculatePrice() {
  var userCountInput = document.getElementById('userCount');
  var userCount = parseInt(userCountInput.value);
  var priceOutput = document.getElementById('priceOutput');

  if (isNaN(userCount)) {
    priceOutput.textContent = 'Invalid input';
  } else {
    var basePrice = 10;
    var increment = 2;
    var price = '';

    for (var i = 1; i <= userCount; i++) {
      var person = i === 1 ? 'Person' : 'People';
      var personPrice = basePrice + (i - 1) * increment;
      price += i + ' ' + person + ': ' + personPrice + ' HezarToman';

      if (i < userCount) {
        price += ', ';
      }
    }

    priceOutput.textContent = 'Price: ' + price;
  }
}
  </script>
</body>
</html>