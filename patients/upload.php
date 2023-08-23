<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database connection settings
    $sname= "localhost";
    $unmae= "root";
    $password = "";

    $db_name = "draft1";

    $conn = mysqli_connect($sname, $unmae, $password, $db_name);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query to insert the image into the database
    $sql = "INSERT INTO product (image) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $imageData);

    // Check if a file was uploaded successfully
    if (isset($_FILES["imageUpload"]) && $_FILES["imageUpload"]["error"] === UPLOAD_ERR_OK) {
        // Read the file data
        $imageData = file_get_contents($_FILES["imageUpload"]["tmp_name"]);

        // Execute the SQL query
        if ($stmt->execute()) {
            echo "Image uploaded and saved to the database successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error uploading the image.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
