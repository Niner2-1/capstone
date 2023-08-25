<?php
include('../login/login.php');
include('../login/reg.php');

?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
		<link rel = "shortcut icon" href = "../images/logo.png" />

    <link rel="stylesheet" href="homepage.css" />
    <!-- Unicons -->
    <link href="C:/xampp/htdocs/new/finaldraft/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body class="body">
    <!-- Header -->
    <header class="header">
      <nav class="nav">
        
        <a href="index.php" class="nav_logo"><img class="logo"  src="../image/logo.png" alt="logo"> Lafuente Medical Clinic</a>

        <ul class="nav_items">
          <li class="nav_item">
            <a href="index.php" class="nav_link">Home</a>
            <a href="page2.html" class="nav_link">Product</a>
            <a href="#sample" class="nav_link">Services</a>
            <a href="#" class="nav_link">Contact</a>
            <a href="../admin/api.php" class="nav_link">appoinment</a>
          </li>
        </ul>
        <button class="button" id="form-open">Log in</button>
      </nav>
    </header>


    <section class="home">
      <div class="form_container">
        <i class="uil uil-times form_close"></i>
        <!-- Login From -->
        <div class="form login_form">

          <form action="../login/login.php" name="form" onsubmit="return isvalid()" method="POST">
            <h2>Login</h2>
            <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
      
            <div class="input_box">
              <input type="text" name="username" id="username" placeholder="Enter your email" required />
              <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
              <input type="password" name="password" id="password" placeholder="Enter your password" required />
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>

            <div class="option_field">
              <span class="checkbox">
                <input type="checkbox" id="check" />
                <label for="check">Remember me</label>
              </span>
              <a href="#" class="forgot_pw">Forgot password?</a>
            </div>

            <button type="submit" name ="submit" class="button">Login Now</button>

            <div class="login_signup">
              Don't have an account? <a href="#" id="signup">Signup</a>
            </div>
          </form>
        </div>

        <!-- Signup From -->
        
        <div class="form signup_form">
          <header>Registration Form</header>
          <form action="../login/reg.php" name="form" onsubmit="return isvalid()" method="POST">

          <div class="title">
        <h2>REGISTER</h2>
        <form action="#" class="form">
    <label>Account Info</label>
        <div class="input-box">
        <label>First name</label>
        <input type="text" name="fname" placeholder="Enter First name" required />
        <label>Mi</label>
        <input type="text" name="mi" placeholder="Mi" />
        </div>
        <div class="input-box">
        <label>Last name</label>
        <input type="text" name="lname" placeholder="Enter Last name" required />
        </div>
        <div class="input-box">
        <label>Sex</label>
        <select class="form-select" name="sex" aria-label="Default select example" name="Sex">
            <option value="Male" >Male</option>
            <option value="Female" >Female</option>
        </select>
        <label>Birth Date</label>
        <div class="input-box">
        <input type="date" name="birthday" placeholder="Enter birth date" required />
        <input type="email" name="email" placeholder="Enter email" required />
        </div>
        <label>Phone Number</label>    
        <div class="input-box">
        
        <input type="number" name="number" placeholder="Enter phone number" required />
        </div>
        <label>Address</label>
        <div class="input-box address">
        
        <input type="text" name="address" placeholder="Enter street address" required />
      </div>
      <label>Username</label>
      <div class="input_box">
        
        <input type="text" name="username" placeholder="Enter your Username" required />
        <i class="uil uil-envelope-alt email"></i>
      </div>
      <label>password</label>
      <div class="input_box">
        
        <input type="password" name="password" placeholder="Create Password" required />
        <i class="uil uil-lock password"></i>
        <i class="uil uil-eye-slash pw_hide"></i>
      </div>
      <label>Confirm password</label>
      <div class="input_box">
        
        <input type="password" placeholder="Confirm password" required />
        <i class="uil uil-lock password"></i>
        <i class="uil uil-eye-slash pw_hide"></i>
      </div>
      





      <button type="submit" name ="register" class="button">Register Now</button>



      </form>
          <div class="login_signup">
            Already have an account? <a href="#" id="login">Login</a>
          </div>
        </div>
      </div>  
    </section>

    <a href="https://www.google.com/maps/place/Dalubhasaan+ng+Lungsod+ng+Lucena/@13.9467081,121.5885902,18z/data=!4m6!3m5!1s0x33bd4b64769fffc1:0x2e9552cc614c2e98!8m2!3d13.9464715!4d121.5896953!16s%2Fg%2F11bz_zgttw?entry=ttu" >
    <button class="button1" >Location</button></a>







































    <div class="footer">
      <p>
        Developer: JOHN ROIDEN ABULENCIA Email:
        <a href="https://mail.google.com/mail/u/0/#inbox?compose=new"
          >johnroiden.abulencia@gmail.com</a
        >
      </p>
    </div>
    
    <script src="homepage.js"></script>
    <script>
            function isvalid(){
                var user = document.form.user.value;
                var pass = document.form.pass.value;
                if(user.length=="" && pass.length==""){
                    alert(" Username and password field is empty!!!");
                    return false;
                }
                else if(user.length==""){
                    alert(" Username field is empty!!!");
                    return false;
                }
                else if(pass.length==""){
                    alert(" Password field is empty!!!");
                    return false;
                }
                
            }
        </script>
    </body>
</html>