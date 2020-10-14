<!DOCTYPE html>
<html lang="en">

<head>
  <title>Boichokro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/register_update.css">
</head>

<body>

  <div class="container border-light background_color">
    <form method="POST">
      <h3 style="background-color: #2E2E2E; color:white; margin:auto -17px 20px; border-radius: 10px 10px 0px 0px; padding:20px 17px 20px;">Update Profile</h3>
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Full Name">
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" placeholder="username">
      </div>
      <div class="form-group">
        <label for="number">Mobile Number</label>
        <input type="tel" class="form-control" name="number" placeholder="+880">
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="House No, Road, City">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="********">
      </div>
      <div class="form-group">
        <label for="cpassword">Confirm Password</label>
        <input type="password" class="form-control" name="cpassword" placeholder="********">
      </div>
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Clear</button>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
        <button type="submit" name="submit" class="btn btn-primary">Delete</button>
      </div>
    </form>
  </div>
</body>

</html>