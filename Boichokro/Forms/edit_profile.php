<!DOCTYPE html>
<html>
<head>
  <title>Boichokro</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
  
  <?php
    session_start();
    if(!isset($_SESSION["username"])){
      header("location:log_in_form.php");
    }
    require_once '../controllers/LoginController.php';
      $username = $_REQUEST["username"];
      $user = getUser($username);
      require_once '../controllers/SearchController.php';
  ?>

 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <h4 class="navbar-text"><strong>BOICHOKRO</strong></h4>
    </div>
      <ul class="nav navbar-nav">
        <li><a href="my_profile.php?username=<?php echo $username;?>">Profile</a></li>
        <li><a href="edit_profile.php?username=<?php echo $username;?>">Edit Profile</a></li>
        <li><a href="share.php?username=<?php echo $username;?> & id=0 & id_err= & bookname_err= & writter_err= & price_err= & img_err= & link_err=">Share Book</a></li>
        <li><a href="log_out_form.php">Log Out</a></li>
    </ul>
     <form class="navbar-form navbar-right" action="" method="post">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="bookname" id="search" onkeyup="searchBook(this)">
        <input type="hidden" name="username" value="<?php echo $username;?>">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit" name="search_by_user">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
  </div>
</nav>

<div id="result1" style="margin-top: 51px; margin-right: 1%; float: right;"></div>

<script>
    function searchBook(input) {
      var searchkey = input.value;
      var xhttp = new XMLHttpRequest();
      if(searchkey==""){
        document.getElementById("result1").innerHTML = "";
      }else{
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         document.getElementById("result1").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "search_user.php?key="+searchkey, true);
      xhttp.send();
      }
}
  </script>

  <br>

  <div class="container" style="border: 3px solid #f1f1f1; border-radius: 10px; width: 600px; margin-top: 70px; background-color: #EFF5FB;">
    
    <form action="" method="post">
      
      <h3 style="background-color: #2E2E2E; color:white; margin:auto -17px 20px; border-radius: 10px 10px 0px 0px; padding:20px 17px 20px;">Edit Profile</h3>

      <div class="form-group">
        <label>Full Name</label>
        <input type="text" class="form-control" name="fullname" value="<?php echo $user['fullname'];?>">
        <span style="color:red;"><?php echo $err_fullname;?></span>
      </div>

      <div class="form-group">
        <input type="hidden" class="form-control" name="username" value="<?php echo $user['username'];?>">
      </div>

      <div class="form-group">
        <label>Mobile Number</label>
        <input type="text" class="form-control" name="number" value="<?php echo $user['number'];?>">
        <span style="color:red;"><?php echo $err_number;?></span>
      </div>

      <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" name="address" value="<?php echo $user['address'];?>">
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
        <input type="submit" class="btn btn-primary" name="edit" value="Edit">
      </div>

    </form>
    
  </div>


</body>

</html>