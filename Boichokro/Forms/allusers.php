<?php
if(!isset($_COOKIE["name"])){
    header("location: log_in_form.php");
  }
	include 'admin_header.php';
	require_once '../controllers/UserController.php';
	$users = getUsers();
?>

<link rel="stylesheet" href="../css/style.css">
<form action="" method="post">
	<div class="center col-sm-9" style="margin-top: 70px; margin-left: 60px">
		<h3 class="text">All Users</h3>
		<table class="table table-striped">
			<thead>
				<th>User Name</th>
				<th>Full Name</th>
				<th>Contact</th>
				<th>Address</th>		
			</thead>

			<tbody>
				<?php
					if(count($users)>0){
						foreach($users as $user){
							echo "<tr class='success'>";
								echo "<td>".$user["username"]."</td>";
								echo "<td>".$user["fullname"]."</td>";
								echo "<td>".$user["number"]."</td>";
								echo "<td>".$user["address"]."</td>";
								echo "<td></td>";
								echo '<td><a href="edit_user.php?username='.$user["username"].'" class="btn btn-success">Edit</a></td>';
								echo '<td><a href="delete_user.php?username='.$user["username"].'" class="btn btn-danger">Delete</a></td>';
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