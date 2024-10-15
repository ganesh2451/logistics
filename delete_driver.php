<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $driver_phone = $conn->real_escape_string($_POST['driver_phone']);

    $sql = "DELETE FROM vehicle WHERE driver_phone='$driver_phone'";

    if ($conn->query($sql) === TRUE) {
        echo "Driver deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
