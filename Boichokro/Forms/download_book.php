<?php
if(!isset($_COOKIE["name"])){
    header("location: log_in_form.php");
  }
  require_once 'admin_header.php';
  require_once '../controllers/FileController.php';
  $id=$_REQUEST['id'];
  $book=downloadBook($id);
?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/search.css">

<body>
  <div class="container  style">
    
    <form method="" action="">
      
      <h3 style="background-color: #2E2E2E; color:white; margin:auto -14.5px 20px; border-radius: 8px 8px 0px 0px; padding:20px 17px 20px;">Download</h3>

      
      <div class="row" style="margin-bottom: 20px;">
          
          <div class="col-sm-4">            
            <div class="form-group">
              <img src="<?php echo $book['book_image']; ?>" alt="boi" class="img-thumbnail" height="135px" width="185px">
            </div>            
          </div>
          <div class="col-sm-8">
            <br><br>
            <div class="form-group">
              <label for="name"><b>Book Name:</b></label>
              <?php echo "&nbsp".$book['bookname'];?>
            </div>
            <div class="form-group">
              <label for="name"><b>Writter:</b></label>
              <?php echo "&nbsp".$book['writter'];?>
            </div>
            <div class="form-group">
              <label for="username"><b>Price:</b></label>
              <?php echo "&nbsp".$book['price'];?>
            </div>

            <div class="form-group" style="margin: -26px auto auto 180px">
              <a class="link" href="<?php echo $book['book_link']; ?>" download>Download</a>
            </div>  

          </div>

        </div>

    </form>
  </div>

</body>

</html>