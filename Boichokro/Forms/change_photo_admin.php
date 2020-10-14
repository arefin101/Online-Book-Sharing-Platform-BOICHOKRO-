<?php
if(!isset($_COOKIE["name"])){
    header("location: log_in_form.php");
  }
  include 'admin_header.php';
?>

<div class="container" style="border: 3px solid #f1f1f1; border-radius: 10px; width: 600px; margin-top: 10px; background-color: #EFF5FB; margin-top: 90px;">

    <?php
      require_once '../controllers/FileController.php';
      $image = getImage($username);
    ?>
    
    <form method="post" action="" enctype="multipart/form-data">
      
      <h3 style="background-color: #2E2E2E; color:white; margin:auto -14.5px 20px; border-radius: 8px 8px 0px 0px; padding:20px 17px 20px;">Change Picture</h3>

      
      <div class="row" style="margin-bottom: 20px;">
          
          <div class="col-sm-4">            
            <div class="form-group">
              <img class="img-thumbnail" style="height: 200px; width:250px" src="<?php echo $image['image']?>" alt="profile">
            </div>            
          </div>
         
          <div class="col-sm-8">
            
          <div class="custom-file mb-3">
            <label class="custom-file-label" for="customFile">Choose file</label>
            <input type="file" class="custom-file-input" id="customFile" name="image">
          </div>
          <input type="hidden" class="custom-file-input" value="nana" name="imag">

            <div class="form-group">
              <button type="submit" name="change" class="btn btn-primary">Change</button>
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