<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/js/validation.js" defer></script>
</head>
<body>
    <header>
        <div class="bar">
           <a class="active" href="index.php">Home</a>
           <?php if (isset($user)): ?>
             
             <a class="loginandsign" href="logout.php">Logout</a>
             
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
    <h1 class="noacc">ثبت نام</h1>
    
    <form action="process-signup.php" method="post" id="signup" novalidate>
        <div>
            <label for="name" class="noacc">اسم</label>
            <input type="text" id="name" name="name">
        </div>
        
        <div>
            <label for="email" class="noacc" >ایمیل</label>
            <input type="email" id="email" name="email">
        </div>
        
        <div>
            <label for="password" class="noacc">پسورد</label>
            <input type="password" id="password" name="password">
        </div>
        
        <div>
            <label for="password_confirmation" class="noacc">پسورد را تکرار کنید</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
        
        <button class="noacc">ثبت نام</button>
    </form>
    <button onclick="window.location.href='login.php'" class="noacc">اکانت دارید؟ اینحا کلیک کنید</button>
</body>
</html>









