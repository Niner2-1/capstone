<?php
// Assuming you have already connected to your database
// and have the $db variable containing the database connection object.

// Assuming you have a unique identifier for the image, like $imageId.
$imageId = 1; // Replace this with your actual image ID.

// Prepare and execute the query to retrieve the image data from the database.
$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "draft1";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

// Check if the image data exists in the database.
if ($stmt->rowCount() > 0) {
    // Fetch the image data as a binary string.
    $imageData = $stmt->fetch(PDO::FETCH_ASSOC)['image_blob'];

    // Set the appropriate content-type header based on the image format (e.g., JPEG).
    header('Content-Type: image/jpeg');

    // Output the image data.
    echo $imageData;
} else {
    // Image not found or invalid image ID.
    echo 'Image not found';
}
?>