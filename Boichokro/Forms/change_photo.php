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

 <nav class="navbar navbar-inverse">
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

<div id="result1" style="margin-top: 51px; margin-right: 1%; float: right;"></div>

  <div class="container" style="border: 3px solid #f1f1f1; border-radius: 10px; width: 600px; margin-top: 10px; background-color: #EFF5FB; margin-top: 90px;">

    <?php
      require_once '../controllers/FileController.php';
      $image = getImage($username);
    ?>
    
    <form method="post" action="" enctype="multipart/form-data">
      
      <h3 style="background-color: #2E2E2E; color:white; margin:auto -14.5px 20px; border-radius: 8px 8px 0px 0px; padding:20px 17px 20px;">Upload Picture</h3>

      
      <div class="row" style="margin-bottom: 20px;">
          
          <div class="col-sm-4">            
            <div class="form-group">
              <img class="img-thumbnail" style="height: 200px; width:250px" src="<?php echo $image['image']?>" alt="profile">
            </div>            
          </div>
         
          <div class="col-sm-8">
            
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="customFile" name="image">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          <input type="hidden" class="custom-file-input" value="nana" name="imag">

            <div class="form-group">
              <button type="submit" name="upload" class="btn btn-primary">Upload</button>
            </div>  
          </div>

        </div>

    </form>
  </div>

  <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

</body>

</html>