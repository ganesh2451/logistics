<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $driver_name = $conn->real_escape_string($_POST['driver_name']);
    $driver_phone = $conn->real_escape_string($_POST['driver_phone']);
    $vehicle_name = $conn->real_escape_string($_POST['vehicle_name']);
    $vehicle_plate = $conn->real_escape_string($_POST['vehicle_plate']);
    $capacity = $conn->real_escape_string($_POST['capacity']);

    // File upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["vehicle_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["vehicle_image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["vehicle_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["vehicle_image"]["tmp_name"], $target_file)) {
            // Insert driver details along with image path into the database
            $sql = "INSERT INTO vehicle (driver_name, driver_phone, vehicle_name, vehicle_plate, capacity, vehicle_image) 
                    VALUES ('$driver_name', '$driver_phone', '$vehicle_name', '$vehicle_plate', '$capacity', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                echo "Driver added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $conn->close();
}

?>
