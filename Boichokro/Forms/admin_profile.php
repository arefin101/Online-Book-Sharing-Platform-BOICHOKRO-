<?php
  include 'admin_header.php';
  require_once '../controllers/LoginController.php';
  if(!isset($_COOKIE["name"])){
    header("location: log_in_form.php");
  }
  require_once '../controllers/FileController.php';
  $username = $_REQUEST["username"];
  $image = getImage($username);
  $books=getAllBook(0);
?>
<link rel="stylesheet" href="../css/profile.css">

<br>

<div class="container" style="margin-top: 50px">
  <div class="row border" style="background-color:#81F7D8">  
<form action="" method="post">
      <div class="col-sm-4">
      <img class="img-thumbnail" src="<?php echo $image['image']?>" alt="profile">
      <div class="form-group" style="margin: 10px auto 10px 20px">
        <input type="hidden" name="username" value="admin">
        <button type="submit" name="change_admin_photo" class="btn btn-primary">Change Photo</button>
      </div>
    </div>
  </form>
  
    <div class="col-sm-4" style="margin-top: 30px">
      <h2>Admin</h2><br>
      <p>Name : Admin</p><br>
      <p>Contact Details : Admin</p><br>
      <p>Address : Admin</p><br>
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
                  echo '<td><a href="download_book.php?id='.$book["id"].' & username=" class="btn btn-success">Download</a></td>';
                  echo '<td><a href="edit_book.php?username= & id='.$book["id"].' & id_err= & bookname_err= & writter_err= & price_err= & img_err= & success=" class="btn btn-primary">Edit</a></td>';
                  echo '<td><a href="delete_book.php?id='.$book["id"].' & username=" class="btn btn-danger">Delete</a></td>';
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
