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

<div id="result1" style=" margin-right: 1%; float: right;"></div>

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

<?php
  require_once '../controllers/FileController.php';
  
  $id = $_REQUEST["id"];
  $book = getBookImage($id);
  $id_err=$_REQUEST["id_err"];
  $bookname_err=$_REQUEST["bookname_err"];
  $writter_err=$_REQUEST["writter_err"];
  $price_err=$_REQUEST["price_err"];
  $img_err=$_REQUEST["img_err"];
  $link_err=$_REQUEST["link_err"];

?>



  <div class="container" style="border: 3px solid #f1f1f1; border-radius: 10px; width: 600px; margin-top: 70px; background-color: #EFF5FB;">
    
    <form method="post" action="" enctype="multipart/form-data">
      
      <h3 style="background-color: #2E2E2E; color:white; margin:auto -14.5px 20px; border-radius: 8px 8px 0px 0px; padding:20px 17px 20px;">Share Book</h3>

      
      <div class="row" style="margin-bottom: 20px;">
          
          <div class="col-sm-6">            
            <div class="form-group">
              <img src="<?php echo $book['book_image']?>" alt="boi" class="img-thumbnail" height="135px" width="185px">
            </div>            
            <div class="custom-file form-group">
              <label class="custom-file-label" for="customFile">Upload Cover Pic</label>
              <input type="file" class="custom-file-input" id="book" name="img">
              <span style="color:red;"><?php echo $img_err;?></span>
            </div>
            <div class="custom-file">
              <label class="custom-file-label" for="customFile">Upload Book</label>
              <input type="file" class="custom-file-input" id="book" name="link">
              <span style="color:red;"><?php echo $link_err;?></span>
            </div>
          </div>
         
          <div class="col-sm-6">
            <div class="form-group">
              <label for="name">ID</label>
              <input type="text" class="form-control" name="id" onfocusout="checkId(this)" placeholder="***">
              <span style="color:red;" id="result"><?php echo $id_err;?></span>
            </div>
            <div class="form-group">
              <label for="name">Book Name</label>
              <input type="text" class="form-control" name="bookname" placeholder="Book Name">
              <span style="color:red;"><?php echo $bookname_err;?></span>
            </div>
            <div class="form-group">
              <label for="name">Writter</label>
              <input type="text" class="form-control" name="writter" placeholder="Author Name">
              <span style="color:red;"><?php echo $writter_err;?></span>
            </div>
            <div class="form-group">
              <label for="username">Price</label>
              <input type="text" class="form-control" name="price" placeholder="100">
              <span style="color:red;"><?php echo $price_err;?></span>
            </div>

            <div class="form-group">
              <button type="submit" name="share" class="btn btn-primary">Share</button>
            </div>  

          </div>

        </div>

    </form>
  </div>

  <script>
    function checkId(input){
      var id = input.value;
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          if(this.responseText == "true"){
            document.getElementById("result").innerHTML = "Book id exists allready";
            document.getElementById("result").style.color = "red";
          }
          else if(this.responseText == "false"){
            document.getElementById("result").innerHTML = "Book id Valid";
            document.getElementById("result").style.color = "green";
          }
        }
      };
      xhttp.open("GET", "check_id.php?username="+id, true);
      xhttp.send();
    }
  </script>

</body>

</html>