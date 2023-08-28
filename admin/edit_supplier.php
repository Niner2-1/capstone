<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
    include 'php.php'
?>
<html lang = "eng">
	<head>
		<title>LAFUENTE MEDICAL CLINIC Patient Record Management Information System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
	</head>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "../images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">LAFUENTE MEDICAL CLINIC Patient Record Management Information System - Padre Burgos</label>
			<?php
				$conn = new mysqli("localhost", "root", "", "capstonedbdraft") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$_SESSION[admin_id]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php
							echo $f['firstname']." ".$f['lastname'];
							$conn->close();
						?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<div id = "sidebar">
			<?php include "sidemenu.php"; ?>
	</div>

    <div id = "content">
		<br />
		<br />
		<br />
		<div class = "panel panel-success">	
			<div class = "panel-heading">
				<label>Supplier INFORMATION / EDIT</label>
				<a style = "float:right; margin-top:-4px;" href = "supplier.php" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<div class = "panel-body">
            <?php
				$conn = new mysqli("localhost", "root", "", "capstonedbdraft") or die(mysqli_error());
                $q = $conn->query("SELECT * FROM `supplier` WHERE `supplier_id` = '$_GET[id]'") or die(mysqli_error());
                $f = $q->fetch_array();
			?>
				<form id = "form_dental" method = "POST" enctype = "multipart/form-data">
				<div class="row inputRow">
                <div class="col-4">
                    <input type="text" class="form-control"  placeholder="supplier_name" name="supplier_name" value = "<?php echo $f['supplier_name']?>" >
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" placeholder="contact_person" name="contact_person" value="<?php echo $f['contact_person']; ?>">
                </div>
                <div class="col-4">
                    <input type="number" class="form-control" placeholder="number" name="number" value="<?php echo $f['number']; ?>">
                </div>
                <div class="col-4">
                    <input type="number" class="form-control" placeholder="telephone" name="telephone" value="<?php echo $f['telephone']; ?>">
                </div>
                <div class="col-4">
                    <input type="email" class="form-control" placeholder="email" name="email" value="<?php echo $f['email']; ?>">
                </div>

                
            </div>
					<br />
					<div class = "form-inline">
						<button class="btn btn-primary" name="edit_supplier"><span class="glyphicon glyphicon-save"></span> SAVE</button>
					</div>
                    <?php //require_once 'edit_query.php'
                    $id = $_GET['id'];
                    
                    ?>
				</form>
			</div>