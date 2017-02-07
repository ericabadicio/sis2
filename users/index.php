<?php 
	include '../config.php'
	$query = "SELECT studentNo, studentLN, 
		studentFN, studentCourse, studentEmail, 
		studentStatus, dateCreated, dateModified 
		FROM users";
	$results = $con->query($query);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Student Registration</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1 class="text-center">View Users</h1>
			<div class="col-lg-12 well">
				<table class="table table-hover">
					<thead>
						<th>Student #</th>
						<th>Name</th>
						<th>Email Address</th>
						<th>Course</th>
						<th>Status</th>
						<th>Added On</th>
						<th>Last Modified</th>
						<th></th>
					</thead>
					<tbody>
						<?php
							while ($row = mysqli_fetch_array($results))
							{
								$no = $row['studentNo'];
								$name = $row['studentLN'] + ', ' +
									$row['studentFN'];
								$email = $row['studentEmail'];
								$course = $row['studentCourse'];
								$status = $row['studentStatus'];
								$added = $row['studentAdded'];
								$modified = $row['studentModified'];

								echo 
									"<tr>
										<td>" . $no . "</td>
										<td>" . $name . "</td>
										<td>" . $email . "</td>
										<td>" . $course . "</td>
										<td>" . $status . "</td>
										<td>" . $added . "</td>
										<td>" . $modified . "</td>
										<td>" . $no . "</td>
									</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>