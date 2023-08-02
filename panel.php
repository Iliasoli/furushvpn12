<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    

    $user = $result->fetch_assoc();
    $stats = $user["stats"];
    $links = $user["links"];
}

?>
  <title>Panel</title>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
<header>
   <div class="bar">
      <a class="active" href="index.php">Home</a>
      <?php if (isset($user)): ?>
        <a class="loginandsign" href="logout.php">Logout</a>
        <a class="loginandsign" href="panel.php">Panel</a>
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
  </style>


<?php
if (isset($user['name'])) {
$hello = $user['name'];
$uppercase = strtoupper($stats);
}
if (isset($user)) {
  if (isset($stats)) {
    if ($stats === "premium") {
    echo "<a href='#' onclick='copyToClipboard(\"" . $links . "\")'>Click Here To Copy Your Links. You Are $hello And Your Account Is $uppercase</a>";
    }} 
    if ($stats === "free") {echo '<a>Your Account Is free</a>';
    }
}

if (!isset($user)) {
  echo "<a href='index.php'>You Are Not Logged In</a>";
}

?>
<script>
function copyToClipboard(text) {
  var copyText = document.createElement("input");
  copyText.type = "text";
  copyText.value = text;
  copyText.setAttribute("readonly", "");
  copyText.style.position = "absolute";
  copyText.style.left = "-9999px";
  document.body.appendChild(copyText);
  copyText.select();
  document.execCommand("copy");
  document.body.removeChild(copyText);
}
</script>