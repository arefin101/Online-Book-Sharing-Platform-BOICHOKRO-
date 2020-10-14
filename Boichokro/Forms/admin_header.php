<!DOCTYPE html>
<head>
  <title>Boichokro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<?php 
  require_once '../controllers/SearchController.php';
?>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <h4 class="navbar-text"><strong>BOICHOKRO</strong></h4>
    </div>
      <ul class="nav navbar-nav">
        <li><a href="admin_profile.php?username='admin'">Profile</a></li>
        <li><a href="user_register.php?username='admin'">Add Users</a></li>
        <li><a href="allusers.php?username='admin'">Edit Users</a></li>
        <li><a href="add.php?username='admin' & id=0 & id_err= & bookname_err= & writter_err= & price_err= & img_err= & link_err=">Add Book</a></li>
        <li><a href="admin_log_out_form.php">Log Out</a></li>
    </ul>
    <form class="navbar-form navbar-right" action="" method="post">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="bookname" id="search" onkeyup="searchBook(this)">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit" name="search">
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
