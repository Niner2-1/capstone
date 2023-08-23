<!DOCTYPE html>
<?php
	require_once 'logincheck.php';




    $date = date("Y", strtotime("+ 8 HOURS"));
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$qfecalysis = $conn->query("SELECT COUNT(*) as total FROM `fecalisys` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$ffecalysis = $qfecalysis->fetch_array();
	$qmaternity = $conn->query("SELECT COUNT(*) as total FROM `birthing` `prenatal` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fmaternity = $qmaternity->fetch_array();
	$qhematology = $conn->query("SELECT COUNT(*) as total FROM `hematology` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fhematology = $qhematology->fetch_array();
	$qdental = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fdental = $qdental->fetch_array();
	$qxray = $conn->query("SELECT COUNT(*) as total FROM `radiological` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fxray = $qxray->fetch_array();
	$qrehab = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$frehab = $qrehab->fetch_array();
	$qsputum = $conn->query("SELECT COUNT(*) as total FROM `sputum` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fsputum = $qsputum->fetch_array();
	$qurinalysis = $conn->query("SELECT COUNT(*) as total FROM `urinalysis` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$furinalysis = $qurinalysis->fetch_array();
?>
<html lang = "eng">
	<head>
		<title>LAFUENTE MEDICAL CLINIC Patient Record Management And Information System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
        
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
		<?php //require 'script.php'?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.min.js"></script>
<script src = "../js/dropdown.js"></script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/custom.js"></script>
<script type = "text/javascript">
	$(document).ready(function() {
		$('#table').DataTable();
		$('#table1').DataTable();
	});





        </script>
		<script src = "../js/jquery.canvasjs.min.js"></script>
		<script type="text/javascript"> 
			window.onload = function() { 
				$("#chartContainer").CanvasJSChart({ 
					title: { 
						text: "Total Patient Population <?php echo $date?>",
						fontSize: 24
					}, 
					axisY: { 
						title: "asda" 
					}, 
					legend :{ 
						verticalAlign: "center", 
						horizontalAlign: "left" 
					}, 
					data: [ 
					{ 
						type: "pie", 
						showInLegend: true, 
						toolTipContent: "{label} <br/> {y}", 
						indexLabel: "{y}", 
						dataPoints: [ 
							{ label: "Fecalysis",  y: 
								<?php 
									if($ffecalysis == ""){
											echo 0;
									}else{
										echo $ffecalysis['total'];
									}
								?>, legendText: "Fecalysis"}, 
							{ label: "Maternity",  y: 
								<?php 
									if($fmaternity == ""){
										echo 0;
									}else{
										echo $fmaternity['total'];
									}	
								?>, legendText: "Maternity"},
							{ label: "Hematology",  y: 
								<?php 
									if($fhematology == ""){
										echo 0;
									}else{
										echo $fhematology['total'];
									}	
								?>, legendText: "Hematology"},
							{ label: "Dental",  y: 
								<?php 
									if($fdental == ""){
										echo 0;
									}else{
									echo $fdental['total'];
									}
								?>, legendText: "Dental"},
							{ label: "Xray",  y: 
								<?php 
									if($fxray == ""){
										echo 0;
									}else{
										echo $fxray['total'];
									}	
								?>, legendText: "Xray"},
							{ label: "Rehabilitation",  y: 
								<?php
									if($frehab == ""){
										echo 0;
									}else{
										echo $frehab['total'];
									}	
								?>, legendText: "Rehabilitation"},
							{ label: "Sputum",  y: 
								<?php
									if($fsputum == ""){
										echo 0;
									}else{
										echo $fsputum['total'];
									}	
								?>, legendText: "Sputum"},
							{ label: "Urinalysis",  y: 
								<?php 
									if($furinalysis == ""){
										echo 0;
									}else{
										echo $furinalysis['total'];
									}	
								?>, legendText: "Urinalysis"}
						] 
					} 
					] 
				}); 
			} 
		</script>

        
















<script>  
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Record", { role: "style" } ],
        ["Barangay 1", 8, "#b87333"],
        ["Barangay 2", 10, "silver"],
        ["Barangay 3", 19, "gold"],
        ["Barangay 4", 21, "color: #e5e4e2"],
        ["Barangay 5", 7, "red"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Record of Patients per Barangay",
        width: 1000,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("chartContainer2"));
      chart.draw(view, options);
  }
</script>


<script>google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'Sales');

      data.addRows([
        [0, 0],   [1, 10],  [2, 23],  [3, 17],  [4, 18],  [5, 9],
        [6, 11],  [7, 27],  [8, 33],  [9, 40],  [10, 32], [11, 35],
        [12, 30], [13, 40], [14, 42], [15, 47], [16, 44], [17, 48],
        [18, 52], [19, 54], [20, 42], [21, 55], [22, 56], [23, 57],
        [24, 60], [25, 50], [26, 52], [27, 51], [28, 49], [29, 53],
        [30, 55], [31, 60], [32, 61], [33, 59], [34, 62], [35, 65],
        [36, 62], [37, 58], [38, 55], [39, 61], [40, 64], [41, 65],
        [42, 63], [43, 66], [44, 67], [45, 69], [46, 69], [47, 70],
        [48, 72], [49, 68], [50, 66], [51, 65], [52, 67], [53, 70],
        [54, 71], [55, 72], [56, 73], [57, 75], [58, 70], [59, 68],
        [60, 64], [61, 60], [62, 65], [63, 67], [64, 68], [65, 69],
        [66, 70], [67, 72], [68, 75], [69, 80]
      ]);

      var options = {
        hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'Popularity'
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('chartContainer3'));

      chart.draw(data, options);
    }</script>







<script>
      google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMultSeries);

function drawMultSeries() {
      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Time of Day');
      data.addColumn('number', 'Motivation Level');
      data.addColumn('number', 'Energy Level');

      data.addRows([
        [{v: [8, 0, 0], f: 'Jan'}, 1, .25],
        [{v: [9, 0, 0], f: 'Feb'}, 2, .5],
        [{v: [10, 0, 0], f:'march'}, 3, 1],
        [{v: [11, 0, 0], f: 'april'}, 4, 2.25],
        [{v: [12, 0, 0], f: '12 pm'}, 5, 2.25],
        [{v: [13, 0, 0], f: '1 pm'}, 6, 8],
        [{v: [14, 0, 0], f: '2 pm'}, 7, 4],
        [{v: [15, 0, 0], f: '3 pm'}, 8, 5.25],
        [{v: [16, 0, 0], f: '4 pm'}, 9, 7.5],
        [{v: [17, 0, 0], f: '5 pm'}, 10, 10],
      ]);

      var options = {
        title: 'Motivation and Energy Level Throughout the Day',
        hAxis: {
          title: 'Time of Day',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Rating (scale of 1-10)'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chartContainer4'));

      chart.draw(data, options);
    }
      
    </script>







        </head>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "../images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">LAFUENTE MEDICAL CLINIC Patient Record Management Information System - Padre Burgos</label>
		<?php 
    $conn = new mysqli("localhost", "root", "", "capstonedbdraft") or die(mysqli_error());

			$q = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = $_SESSION[admin_id]") or die(mysqli_error());
			$f = $q->fetch_array();
		?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php 
							echo $f['firstname']." ".$f['lastname'];
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
		<div class = "well">
			 
		    <div id="chartContainer" style="width: 100%; height: 400px"></div>
			
		</div>
        <br>
        <div class = "well">
			 
		    <div id="chartContainer2" style="width: 100%; height: 400px"></div>
			
		</div>
		<br>
        <div class = "well">
			 
		    <div id="chartContainer3" style="width: 100%; height: 400px"></div>
			
		</div>
		<br>
        <div class = "well">
			 
		    <div id="chartContainer4" style="width: 100%; height: 400px"></div>
			
		</div>
	</div>



    <div id = "footer">
		<label class = "footer-title"></label>
	</div>
		
</body>
</html>

