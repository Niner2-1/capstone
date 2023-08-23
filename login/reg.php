<?php
include('../database/connect.php');

if (isset($_POST["register"])) {
    $fname = $_POST["fname"];
    $mi = $_POST["mi"];
    $lname = $_POST["lname"];
    $sex = $_POST["sex"];
    $birthday = $_POST["birthday"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $address = $_POST["address"];
    $user_type = "Customer";
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($user)) {
        echo "<script>window.location.href = '../homepage/index.php';
            alert('Username/Email Has Already Taken');</script>";
    } else {
        $query = "INSERT INTO users (fname, mi, lname, sex, birthday, email, number, address, user_type, username, password) VALUES('$fname', '$mi', '$lname', '$sex', '$birthday', '$email', '$number', '$address','$user_type', '$username', '$hashed_password')";
        mysqli_query($conn, $query);
        echo "<script>
            window.location.href = '../homepage/index.php';
            alert('Registration Successful');</script>";
    }
}
?>