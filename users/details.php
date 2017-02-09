<?php
	if (isset($_REQUEST['no']))
	{
		include '../config.php';
		$query = "SELECT studentID, studentNo, studentLN, 
			studentFN, studentEmail, studentCourse, 
			studentStatus FROM users 
			WHERE studentNo=" . $_REQUEST['no'];

		$results = $con->query($query);

		if (mysqli_num_rows($results) > 0)
		{
			while ($row = mysqli_fetch_array($results))
			{
				$id = $row['studentID'];
				$no = $row['studentNo'];
				$ln = $row['studentLN'];
				$fn = $row['studentFN'];
				$email = $row['studentEmail'];
				$course = $row['studentCourse'];
			}

			if (isset($_POST['update']))
			{
				$studentNo = mysqli_real_escape_string($con, $_POST['no']);
				$studentLN = mysqli_real_escape_string($con, $_POST['ln']);
				$studentFN = mysqli_real_escape_string($con, $_POST['fn']);
				$studentEmail = mysqli_real_escape_string($con, $_POST['ea']);
				$studentCourse = mysqli_real_escape_string($con, $_POST['course']);

				$query_update = "UPDATE users SET 
					studentNo='" . $studentNo . "', 
					studentLN='" . $studentLN . "', 
					studentFN='" . $studentFN . "', 
					studentEmail='" . $studentEmail . "', 
					studentCourse='" . $studentCourse . "', 
					dateModified=NOW() 
					WHERE studentID=" . $id;
				mysqli_query($con, $query_update);
				header('location: index.php');
			}

		}
		else
		{
			header('location: index.php');
		}

	}
	else
	{
		header('location: index.php');
	}
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>User ID<?php echo $id; ?> Details</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1 class="text-center">User ID#<?php echo $id; ?> Details</h1>
			<div class="col-lg-offset-3 col-lg-6 well">
				<form method="POST" class="form-horizontal">
					<div class="form-group">
						<label class="col-lg-4 control-label">
							Student Number
						</label>
						<div class="col-lg-8">
							<input name="no" type="number"
								class="form-control" value='<?php echo $no; ?>' required />
							</input>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label">
							First Name
						</label>
						<div class="col-lg-8">
							<input name="fn"
								class="form-control" value='<?php echo $fn; ?>' required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label">
							Last Name
						</label>
						<div class="col-lg-8">
							<input name="ln"
								class="form-control" value='<?php echo $ln; ?>' required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label">
							Email Address
						</label>
						<div class="col-lg-8">
							<input name="ea"
								class="form-control" value='<?php echo $email; ?>' required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label">
							Password
						</label>
						<div class="col-lg-8">
							<input name="pw" type="password"
								class="form-control" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label">
							Course
						</label>
						<div class="col-lg-8">
							<input name="course"
								class="form-control" value='<?php echo $course; ?>' required />
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-offset-4 col-lg-8">
							<button name="update"
								class="btn btn-success">
								Update
							</button>
							<a href="index.php" class="btn btn-default">
								Back to View
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>