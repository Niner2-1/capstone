<?php 

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

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style type="text/css">
      .chartbox{
        width: 700px;
      }
    </style>
</head>
<body>



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









<div class="chartbox">
  <canvas id="myChart"></canvas>
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
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
        }

          
//render Block

const myChart = new Chart (
  document.getElementById('myChart'),
  config
);

</script>









</body>
</html>
<script src="..\js\ph-address-selector.js"></script>
