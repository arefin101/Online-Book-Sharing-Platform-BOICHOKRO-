
<?php 
if(!isset($_COOKIE["name"])){
    header("location: log_in_form.php");
  }
  include 'admin_header.php';
  require_once '../controllers/FileController.php';
  $id = $_REQUEST["id"];
  $book = getBookImage($id);
  $id_err=$_REQUEST["id_err"];
  $bookname_err=$_REQUEST["bookname_err"];
  $writter_err=$_REQUEST["writter_err"];
  $price_err=$_REQUEST["price_err"];
  $img_err=$_REQUEST["img_err"];
  $book = getBook($id);
  $success=$_REQUEST['success'];
  ?>

<link rel="stylesheet" href="../css/share_upload.css">

  <div class="container  style" style="margin-top: 70px">
    
    <form method="post" action="" enctype="multipart/form-data">
      
      <h3 style="background-color: #2E2E2E; color:white; margin:auto -14.5px 20px; border-radius: 8px 8px 0px 0px; padding:20px 17px 20px;">Edit Book</h3>

      <h4 style="background-color: #CEF6D8; text-align: center; border-radius: 10px;"><?php echo $success; ?></h4>

      
      <div class="row" style="margin-bottom: 20px;">
          
          <div class="col-sm-6">            
            <div class="form-group">
              <img src="<?php echo $book['book_image']?>" alt="boi" class="img-thumbnail" height="135px" width="185px">
            </div>            
            <div class="custom-file form-group">
              <label class="custom-file-label" for="customFile">Change Cover Pic</label>
              <input type="file" class="custom-file-input" id="book" name="img">
              <span style="color:red;"><?php echo $img_err;?></span>
            </div>
          </div>
         
          <div class="col-sm-6">
            <div class="form-group">
              <input type="hidden" class="form-control" name="id" value="<?php echo $book['id'];?>">
            </div>
            <div class="form-group">
              <label for="name">Book Name</label>
              <input type="text" class="form-control" name="bookname" value="<?php echo $book['bookname'];?>">
              <span style="color:red;"><?php echo $bookname_err;?></span>
            </div>
            <div class="form-group">
              <label for="name">Writter</label>
              <input type="text" class="form-control" name="writter" value="<?php echo $book['writter'];?>">
              <span style="color:red;"><?php echo $writter_err;?></span>
            </div>
            <div class="form-group">
              <label for="username">Price</label>
              <input type="text" class="form-control" name="price" value="<?php echo $book['price'];?>">
              <span style="color:red;"><?php echo $price_err;?></span>
            </div>

            <div class="form-group">
              <button type="submit" name="edit" class="btn btn-primary">Edit</button>
            </div>  

          </div>

        </div>

    </form>
  </div>

</div>

</body>

</html>