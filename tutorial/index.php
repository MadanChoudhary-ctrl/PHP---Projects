<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<head>
	<title>CRUD Form</title>
</head>

<body>
	<?php require_once 'process.php'; ?>
	<?php
		if(isset($_SESSION['message'])) { ?>
			<div class="alert <?php echo "alert-".$_SESSION['msg_type'];?>">
				<?php
					echo $_SESSION['message'];
					unset($_SESSION['message']);
				?>
			</div>
		
		<?php }?>
	<?php

	$link = mysqli_connect("localhost", "root", "", "demo");
	if (!$link) {
		die("Could not connect to db.");
	}


	$query = "SELECT * from students";

	$result = mysqli_query($link, $query);
	if (!$result) {
		die("Could not run query");
	}

	?>


	<div class="card col-md-6 offset-3" style="margin-top: 30px;">
		<div class="card-header text-center">
			Student Table
		</div>
		<div class="card-body">
			<div class="row justify-content-center">
				<table class="table">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($row = mysqli_fetch_assoc($result)) {
						?>
							<tr>
								<td><?php echo $row['firstname']; ?></td>
								<td><?php echo $row['lastname']; ?></td>
								<td><a href="index.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>
									<a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="card col-md-6 offset-3" style="margin-top: 40px;">
		<div class="card-header text-center">
			CRUD Form Tutorial
		</div>
		<div class="card-body">
			<form method="post" action="process.php">
				<div class="form-group">
					<label>First Name:</label>
					<input type="text" class="form-control" placeholder="Enter your first name" name="firstname" required>
				</div>
				<div class="form-group">
					<label>Last Name:</label>
					<input type="text" class="form-control" placeholder="Enter your last name" name="lastname" required>
				</div>
				<div class="col-md-6 offset-5">
					<button type="submit" class="btn btn-lg btn-primary" name="submit">Save</button>
				</div>
			</form>
		</div>
	</div>
</body>

</html>