<!DOCTYPE html>
<html>
<head>
  <title>Boichokro</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/register_update.css">
</head>

<body>
  
<?php 
  require_once '../controllers/LoginController.php';
  ?>

  <div class="container border-light background_color">
    
    <form action="" method="post" enctype="multipart/form-data">
      
      <h3 style="background-color: #2E2E2E; color:white; margin:auto -17px 20px; border-radius: 10px 10px 0px 0px; padding:20px 17px 20px;">Register</h3>


      <div class="form-group">
        <input type="hidden" class="custom-file-input" id="customFile" name="image" value="../image/profile.png">
      </div>

      <div class="form-group">
        <label>Full Name</label>
        <input type="text" class="form-control" name="fullname" placeholder="Full Name">
        <span style="color:red;"><?php echo $err_fullname;?></span>
      </div>

      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" onfocusout="checkUser(this)" placeholder="username">
        <span style="color:red;" id="err_username"><?php echo $err_username;?></span>
      </div>

      <div class="form-group">
        <label>Mobile Number</label>
        <input type="text" class="form-control" name="number" placeholder="+880">
        <span style="color:red;"><?php echo $err_number;?></span>
      </div>

      <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" name="address" placeholder="House No, Road, City">
        <span style="color:red;"><?php echo $err_address;?></span>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="********">
        <span style="color:red;"><?php echo $err_password;?></span>
      </div>

      <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control" name="cpassword" placeholder="********">
        <span style="color:red;"><?php echo $err_cpassword;?></span>
      </div>

      <div class="form-group">       
        <input type="submit" class="btn btn-primary" name="register" value="Register">
        <input type="Reset" class="btn btn-danger" value="Reset">
      </div>

      <div class="form-group">
        <span style="color:green;"><?php echo $success;?></span>
      </div>

      <div class="form-group">
        <span>Already have an account? <a href="Log_In_Form.php">Login</a></span>
      </div>

    </form>

  </div>

  <script>
    function checkUser(input){
      var key = input.value;
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         if(this.responseText == "true"){
          document.getElementById("err_username").innerHTML = "User exists allready";
          document.getElementById("err_username").style.color = "red";
         }
         else if(this.responseText == "false"){
          document.getElementById("err_username").innerHTML = "User Valid";
          document.getElementById("err_username").style.color = "green";
         }
        }
      };
      xhttp.open("GET", "check_user.php?key="+key, true);
      xhttp.send();
    }
  </script>

</body>

</html>