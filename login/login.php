<?php
include('../database/connect.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT user_type, password FROM users WHERE username = '$username'";  
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $hashed_password = $row['password'];
        $user_type = $row['user_type'];

        if (password_verify($password, $hashed_password)) {
            if ($user_type == 'Admin') {
                header("Location: ../admin/home.php");
            } elseif ($user_type == 'Staff') {
                header("Location: ../admin/dashboardV2.php");
            } elseif ($user_type == 'Customer') {
                header("Location: ../patients/patients.php");
            } else {
                echo "Invalid user_type";
            }
            exit(); // Add an exit() after redirecting to stop further execution
        } else {
            echo '<script>
                    alert("Login failed. Invalid username or password!!");
                    window.location.href = "../homepage/index.php";
                  </script>';
            exit(); // Add an exit() after displaying the alert to stop further execution
        }
    } else {
        echo '<script>
                alert("Login failed. Invalid username or password!!");
                window.location.href = "../homepage/index.php";
              </script>';
        exit(); // Add an exit() after displaying the alert to stop further execution
    }
}
?>