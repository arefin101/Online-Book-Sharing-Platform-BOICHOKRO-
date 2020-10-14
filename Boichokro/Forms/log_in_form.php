<!DOCTYPE html>
<html>
<head>
  <title>Boichokro</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/log_in.css">
</head>

<body>

<?php 
  require_once '../controllers/LoginController.php';
?>

<div class="container border-light background_color">

  <form action="" method="post">

  <div class="imgcontainer">
    <img src="../image/book.png" alt="Book" class="book">
  </div>
  <h2 style="text-align: center; margin-top: 10px;">BOICHOKRO</h2>


  <div class="padding">

    <div class="form-group">
      <label for="email">User Name:</label>
      <input type="text" class="form-control" name="username" placeholder="Enter user name">
      <span style="color:red;"><?php echo $err_username;?></span>
    </div>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" placeholder="Enter password">
      <span style="color:red;"><?php echo $err_password;?></span>
    </div>

    <button type="submit" name="login" class="btn btn-primary button">Log In</button>
    
    <div class="form-group center_align">
      <span>Don't have an account? <a href="register_form.php">Register</a></span>
    </div>
  </div>

  </form>
</div>

</body> 
</html>
