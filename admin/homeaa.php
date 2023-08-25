<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	
	$username = "root";
	$password = "";
	$database = "chartjs";
	
	try {
	  $pdo = new PDO("mysql:host=localhost;database=$database", $username, $password);
	  // Set the PDO error mode to exception
	  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e){
	  die("ERROR: Could not connect. " . $e->getMessage());
	}

	$conn = new mysqli("localhost", "root", "", "capstonedbdraft") or die(mysqli_error());
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
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<?php //require 'script.php'?>
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
		
	</head>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "../images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">LAFUENTE MEDICAL CLINIC Patient Record Management Information System - Padre Burgos</label>
		<?php 
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

	<?php 
// Attempt select query execution
try{
  $sql = "SELECT * FROM chartjs.barchart";   
  $result = $pdo->query($sql);
  if($result->rowCount() > 0) {
    $revenue = array();
    $cost = array();
    $profit = array();
    while($row = $result->fetch()) {
      
      $revenue[] = $row["revenue"];
      $cost[] = $row["cost"];
      $profit[] = $row["profit"];
    }
  unset($result);
  } else {
    echo "No records matching your query were found.";
  }
} catch(PDOException $e){
  die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>







<div id="content">
    <br />
    <br />
    <br />
    <div class="well" style="width: 50%">
        <div id="chartContainer" style="width: 100%; height: 400px">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <div class="well" style="width: 50%">
        <div id="chartContainer1" style="width: 100%; height: 400px">
            <canvas id="myChart1"></canvas>
        </div>
    </div>
</div>














	<script>

//setup block

const revenue = <?php echo json_encode($revenue);  ?>;
const cost = <?php echo json_encode($cost);  ?>;
const profit = <?php echo json_encode($profit);  ?>;

const data = {
labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
            label: '# of revenue',
            data: revenue,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',

            borderWidth: 1

          },
          {
            label: '# of cost',
            data: cost,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
               
            borderColor: 'rgba(255, 99, 132, 0.2)',
            borderWidth: 1

          },
          {
            label: '# of profit',
            data: profit,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',

            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1

          }
        
        
        ]

        };


        //config block
		const config = {
    type: 'bar',
    data,
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Display 1', // Your label for Display 1
                font: {
                    size: 18
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
};

          
//render Block

const myChart = new Chart (
  document.getElementById('myChart'),
  config
);



        //config block
		const config1 = {
    type: 'bar',
    data,
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Display 2', // Your label for Display 2
                font: {
                    size: 18
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
};



//render Block

const myChart1 = new Chart (
document.getElementById('myChart1'),
config1
);

</script>


















































	<div id = "footer">
		<label class = "footer-title"></label>
	</div>
		
</body>
</html>

























