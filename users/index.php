<?php 
	include '../config.php';
	$query = "SELECT studentNo, studentLN, 
		studentFN, studentEmail, studentCourse, 
		studentStatus, dateCreated, dateModified 
		FROM users";
	$results = $con->query($query);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Student Registration</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
								$ln = $row['studentLN'];
								$fn = $row['studentFN'];
								$email = $row['studentEmail'];
								$course = $row['studentCourse'];
								$status = $row['studentStatus'];
								$added = new DateTime($row['dateCreated']);
								$modified = new DateTime($row['dateModified']);

								echo 
									"<tr>
										<td>" . $no . "</td>
										<td>" . $ln . ', ' . $fn . "</td>
										<td>" . $email . "</td>
										<td>" . $course . "</td>
										<td>" . $status . "</td>
										<td>" . $added->format('F d, Y g:i A') . "</td>
										<td>" . $modified->format('F d, Y g:i A') . "</td>
										<td><a class='btn btn-xs btn-info' href='details.php?no=" . $no . "'><i class='fa fa-edit'></i></a>
											<a class='btn btn-danger btn-xs btn-info' href='index.php?no=" . $no . "'><i class='fa fa-trash'></i></a></td>
									</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>