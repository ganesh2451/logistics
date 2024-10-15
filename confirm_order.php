<?php
include 'db_connection.php';

$vehicleId = $_GET['vehicleId'];
$capacity = $_GET['capacity'];

// Fetch vehicle details
$sql = "SELECT * FROM vehicle WHERE id = $vehicleId";
$result = $conn->query($sql);
$vehicle = $result->fetch_assoc();

// Generate a random estimated delivery date
$delivery_date = date('Y-m-d', strtotime('+'.rand(1, 10).' days'));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="confirm.css">
</head>
<body>
  

    <main>
        <h1>Order Confirmed</h1>
        <div class="vehicle-info">
            <p><strong>Driver Name:</strong> <?php echo $vehicle['driver_name']; ?></p>
            <p><strong>Driver Phone:</strong> <?php echo $vehicle['driver_phone']; ?></p>
            <p><strong>Vehicle Plate Number:</strong> <?php echo $vehicle['vehicle_plate']; ?></p>
            <p><strong>Vehicle Name:</strong> <?php echo $vehicle['vehicle_name']; ?></p>
            <p><strong>Capacity:</strong> <?php echo $vehicle['capacity']; ?></p>
            <img src="<?php echo $vehicle['vehicle_image']; ?>" alt="Vehicle Image" width="200" height="200"><br>
            <p><strong>Estimated Delivery Date:</strong> <?php echo $delivery_date; ?></p>
        </div>
    </main>

   
   
</body>
</html>
