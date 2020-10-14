<!DOCTYPE html>
<html>
<head>
  <title>Boichokro</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/profile.css">
</head>

<body style="background-color: #EFF5FB">
  
  <?php
    session_start();
    if(!isset($_SESSION["username"])){
      header("location:log_in_form.php");
    }
    require_once '../controllers/LoginController.php';
      $username = $_REQUEST["username"];
      $user = getUser($username);
    require_once '../controllers/FileController.php';
    $image = getImage($username);
    $books=getAllBook(0);
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

<div class="container">
  <div class="row border" style="background-color:#81F7D8; margin-top: 50px;">
    
  <form action="" method="post">
    <div class="col-sm-4">
      <img class="img-thumbnail" style="height: 230px; width:220px" src="<?php echo $image['image']?>" alt="profile">
      <div class="form-group" style="margin: 10px auto 10px 20px">
      <input type="hidden" name="username" value="<?php echo $user['username']; ?>">
      <input type="submit" name="change_photo" class="btn btn-primary" value="Change Photo">
    </div>
  </div>
  </form>
    <div class="col-sm-4" style="margin-top: 30px">
      <h2>Hi <?php echo $user["username"]; ?></h2><br>
      <p>Name: <?php echo $user["fullname"]; ?></p><br>
      <p>Contact Details: <?php echo $user["number"]; ?></p><br>
      <p>Address: <?php echo $user["address"]; ?></p><br>
    </div>

  </div>
</div>

<br>

<form action="" method="post">
  <div class="container">
    <table class="table table-hover">
        <thead>
          <th>Book Name</th>
          <th>Writter</th>
          <th>Price(tk)</th> 
        </thead>

        <tbody>
          <?php
            if(count($books)>0){
              foreach($books as $book){
                echo "<tr class='success'>";
                  echo "<td>".$book["bookname"]."</td>";
                  echo "<td>".$book["writter"]."</td>";
                  echo "<td>".$book["price"]."</td>";
                  echo "<td></td>";
                  echo '<td><a href="download_by_user.php?id='.$book["id"].' & username='.$username.'" class="btn btn-success">Download</a></td>';
                echo "<tr>";
              }
            }
          ?>
          
        </tbody>
      </table>
  </div>
</form>

</body>

</html>
