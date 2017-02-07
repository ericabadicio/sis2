<?php
	include 'config.php';

	if(isset($_POST['register']))
	{
		$studentNo = mysqli_real_escape_string($con, $_POST['no']);
		$studentLN = mysqli_real_escape_string($con, $_POST['ln']);
		$studentFN = mysqli_real_escape_string($con, $_POST['fn']);
		$studentEmail = mysqli_real_escape_string($con, $_POST['ea']);
		$studentPassword = hash('sha256', mysqli_real_escape_string($con, $_POST['pwd']));
		$studentCourse = mysqli_real_escape_string($con, $_POST['course']);

		$query = "INSERT INTO users VALUES ('', $studentNo, '$studentLN', '$studentFN',
			 '$studentEmail', '$studentPassword', '$studentCourse', 'Pending', NOW(), NULL)";

		$result = mysqli_query($con, $query);
		header('location: login.php');
	}
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Student Registration</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1 class="text-center">Student Registration</h1>
			<div class="col-lg-offset-3 col-lg-6 well">
				<form method="POST" class="form-horizontal">
					<div class="form-group">
						<label class="col-lg-4 control-label">
							Student Number
						</label>
						<div class="col-lg-8">
							<input name="no" type="number"
								class="form-control" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label">
							First Name
						</label>
						<div class="col-lg-8">
							<input name="fn"
								class="form-control" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label">
							Last Name
						</label>
						<div class="col-lg-8">
							<input name="ln"
								class="form-control" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label">
							Email Address
						</label>
						<div class="col-lg-8">
							<input name="ea"
								class="form-control" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label">
							Password
						</label>
						<div class="col-lg-8">
							<input name="pw" type="password"
								class="form-control" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label">
							Course
						</label>
						<div class="col-lg-8">
							<input name="course"
								class="form-control" required />
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-offset-4 col-lg-8">
							<button name="register"
								class="btn btn-success">
								Register
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>