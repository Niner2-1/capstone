<?php

require_once '../database/connect.php';

$sql = "SELECT * From product";
$all_product = $conn->query($sql);







?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel = "shortcut icon" href = "../images/logo.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dashboard.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Pharmacy</title>

    <style>
    
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        color: black;
        }
  


        .head{
        top: 0;
        width: 100%;
        height: 65px;
        position: relative;
        background-color: #272727;
        }

        .nav {
  max-width: 1600px;
  width: 100%;
  margin: 0 auto;
}
.nav,
.nav_item {
  display: flex;
  height: 100%;
  align-items: center;
  justify-content: space-around;
  font-weight: bold;
}
.nav_logo,
.nav_link,
.button {
  color: #0b0217;
}

.logo {
  height: 65px;
  width: auto;
  border-radius: 50px;
}
.nav_item {
  column-gap: 25px;
}

.nav_link:hover {
  color: green;
}

        .dashnav{
        padding-left: 1em;
        top: 0;
        width: 100%;
        height: 60px;
        position: relative;
        background-color: #808080;
        display: flex;
        align-items: center;
        font-weight: bold;
        font-size: 25px;

        }

        main{
            max-width: 1500px;
            width: 95%;
            margin: 30px auto;
            display: flex;
            flex-wrap: wrap;
            
            
        }
        

        main .card{
            max-width: 300px;
            flex: 1 1 210px;
            text-align: center;
            border: 1px solid lightgray;
            margin: 20px;
        } 

        main .card .image{
            height: 50%;
            margin-bottom: 20px;
        }

        main .card .image img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        main .card .caption{
            padding-left: 1em;
            text-align: left;
            line-height: 3em;
            height: 25%;
        }

        main .card .caption p{
            font-size: 1.5em;
        }

        del{
            text-decoration: line-through;
        }

        main .card .caption .rate{
            display: flex;
        }

        main .card .caption .rate{
            display: flex;
        }

        main .card .caption .rate i{
            margin-left: 2px;
        }

        main .card .caption .rate .checked{
        color: orange;
        }

        main .card a{
            width: 50%;
        }

        main .card button{
            border: 2px solid black;
            padding: 1em;
            width: 80%;
            cursor: pointer;
            margin-top: 2em;
            font-weight: bold;
            position: relative;
        }

        .add {
        background-color: #00BFA6;
        padding: 14px 40px;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 2px;
        cursor: pointer;
        border-radius: 10px;
        border: 2px dashed #00BFA6;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
        transition: .4s;
        }

        .add span:last-child {
        display: none;
        }

        .add:hover {
        transition: .4s;
        border: 2px dashed #00BFA6;
        background-color: #fff;
        color: #00BFA6;
        }

        .add:active {
        background-color: #87dbd0;
        }



        
        

    </style>

</head>
<body>

<header class="header">
      <nav class="nav">
        
        <a href="index.php" class="nav_logo"><img class="logo"  src="../images/logo.png" alt="logo"></a>

        <ul class="nav_items">
          <li class="nav_item">
            <a href="index.php" class="nav_link">Home</a>
            <a href="page2.html" class="nav_link">Product</a>
            <a href="#sample" class="nav_link">Services</a>
            <a href="#" class="nav_link">Contact</a>
            <a href="../admin/api.php" class="nav_link">appoinment</a>
          </li>
        </ul>
        <a href="../patients/patients.php" class="nav_link"><button class="button">LOG OUT</button></a>
      </nav>
    </header>
  <nav class="dashnav"> 
    <p>LAFUENTE PHARMACY ORDERING SYSTEM</p>
    </nav>


    <main>
    <?php
    while ($row = mysqli_fetch_assoc($all_product)) {
        ?>
        <div class="card">
            <div class="image">
                <?php
                // Convert the BLOB data to Base64 encoded data
                $base64_image = base64_encode($row["image"]);
                $image_src = 'data:image/jpeg;base64,' . $base64_image;
                ?>
                <img src="<?php echo $image_src; ?>" alt="Product Image">
            </div>
            <div class="caption">
                <p class="rate">
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star checked"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </p>
                <p class="product_name"><?php echo $row["product_name"] ?></p>
                <p class="price"><b><?php echo $row["price"] ?></b></p>
                <p class="discount"><b><del><?php echo $row["discount"] ?></del></b></p>
            </div>
            <a href="product_info.php"><button class="add">Add to Cart</button></a>
        </div>
        
        <?php
    }
    ?>
</main>



</body>
