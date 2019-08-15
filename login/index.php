
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Clean login form</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <div class="login">
  <div class="heading">
    <h2>Sign in</h2>
    <form action="session.php" method="POST">

      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" class="form-control" name="username" placeholder="username" required>
          </div>

        <div class="input-group input-group-lg">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input type="password" class="form-control" name="password" placeholder="password" required>
        </div>

        <button type="submit" class="float">Login</button>
       </form>
 		</div>
 </div>
  
  

</body>

</html>
