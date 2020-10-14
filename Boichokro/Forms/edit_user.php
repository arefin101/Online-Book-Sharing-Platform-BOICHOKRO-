
<?php 
  include 'admin_header.php';
  require_once '../controllers/UserController.php';
  $username = $_REQUEST["username"];
  $user = getUser($username);
  ?>

<div style="display: flex; width:40%; margin:100px auto 30px; border-radius: 10px;">
  <div class="container border-light" style="background-color: #EFF5FB">
    
    <form action="" method="post">
      
      <h3 style="background-color: #2E2E2E; color:white; margin:auto -17px 20px; border-radius: 10px 10px 0px 0px; padding:20px 17px 20px;">Edit Profile</h3>

      <div class="form-group">
        <label>Full Name</label>
        <input type="text" class="form-control" name="fullname" value="<?php echo $user['fullname'];?>">
        <span style="color:red;"><?php echo $err_fullname;?></span>
      </div>

      <div class="form-group">
        <input type="hidden" class="form-control" name="username" value="<?php echo $username;?>">
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
        <input type="submit" class="btn btn-primary" name="edit_user" value="Edit">
        <input type="Reset" class="btn btn-danger" value="Reset">
      </div>

    </form>

  </div>
</div>

</body>

</html>