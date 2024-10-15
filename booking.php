<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $conn->real_escape_string($_POST['date']);
    $address_pickup = $conn->real_escape_string($_POST['address_pickup']);
    $address_drop = $conn->real_escape_string($_POST['address_drop']);
    $size_of_product = $conn->real_escape_string($_POST['size_of_product']);

    $sql = "INSERT INTO booking (date, address_pickup, address_drop, size_of_product) VALUES ('$date', '$address_pickup', '$address_drop', '$size_of_product')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Booking successfully Choose the available vehicle')</script>";
        echo "<meta http-equiv='refresh' content='0;vehicle.php'/>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
