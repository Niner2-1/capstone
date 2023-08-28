<!DOCTYPE html>
<?php
	require_once'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "capstonedbdraft") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `users` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<html lang = "en">
	<head>	
		<title>LAFUENTE MEDICAL CLINIC Patient Record Management Information System</title>
		<meta charset = "UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
	</head>
	<body>
		
	<div class = "navbar navbar-default navbar-fixed-top">
		
		<img src = "../images/logo.png" style = "float:left;" height = "55px"><label class = "navbar-brand">LAFUENTE MEDICAL CLINIC Patient Record Management Information System - Padre Burgos</label>
		<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php echo $fetch['firstname']." ".$fetch['lastname'] ?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><span class = "glyphicon glyphicon-log-out"></span> Logout</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	
	<br />
	<br />
	<br />
	<div class = "well">
		<div class = "panel panel-warning">
			<div class = "panel-heading">
				<center><label>INDIVIDUAL TREATMENT RECORD</label></center>
			</div>
		</div>	
		<a href = "view_urinalysis_record.php" id = "d_record" style = "float:right; margin-right:10px;" class = "btn btn-success"><span class = "glyphicon glyphicon-book"></span> MEDICAL RECORD</a>
		<br />
		<br />
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<h4>INDIVIDUAL TREATMENT RECORD</h4>
			</div>
		</div>
		<br />
		<table id = "table" class = "display" cellspacing = "0" >
			<thead>
				<tr>
					<th>ITR No</th>
					<th>Name</th>
					<th>Birthdate</th>
					<th>Age</th>
					<th>Address</th>
					<th>Civil Status</th>
					<th>Gender</th>
					<th><center>Action</center></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$conn = new mysqli("localhost", "root", "", "capstonedbdraft") or die(mysqli_error());
				$query = $conn->query("SELECT * FROM `patient_record` ORDER BY `itr_no` DESC") or die(mysqli_error());
				while($fetch = $query->fetch_array()){
			?>
				<tr>
					<td><?php echo $fetch['itr_no']?></td>
					<td><?php echo $fetch['firstname']." ".$fetch['lastname'] ?></td>
					<td><?php echo $fetch['birthdate'] ?></td>
					<td><?php echo $fetch['age'] ?></td>
					<td><?php echo $fetch['region']." ".$fetch['province']." ".$fetch['city']." ".$fetch['barangay']   ?></td>
					<td><?php echo $fetch['civil_status'] ?></td>
					<td><?php echo $fetch['sex'] ?></td>
					<td>
						<center>
							<a href = "view_urinalysis.php?itr_no=<?php echo $fetch['itr_no']?>"class = "btn btn-sm btn-info"><span class = "glyphicon glyphicon-search"></span> VIEW DETAIL</a> 
						</center>
					</td>
				</tr>
			<?php
				}
					$conn->close();
			?>	
			</tbody>
		</table>
		
	</div>









	







	<div id = "footer">
		<label class = "footer-title"></label>
	</div>
	</body>
		<?php require "script.php" ?>
</html>

