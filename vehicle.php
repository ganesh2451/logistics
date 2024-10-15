<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Selection</title>
    <link rel="stylesheet" href="vehicle.css">
</head>
<body>
   
    
    <header>
        <h1>Select a Vehicle</h1>
    </header>

    <div class="container">
        <?php
        include 'db_connection.php';

        $sql = "SELECT * FROM vehicle";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='driver'>";
                echo "<img src='" . $row['vehicle_image'] . "' alt='Vehicle Image'><br>";
                echo "<div class='driver-info'>";
                echo "<p>Driver Name: " . $row['driver_name'] . "</p>";
                echo "<p>Driver Phone: " . $row['driver_phone'] . "</p>";
                echo "<p>Vehicle Plate Number: " . $row['vehicle_plate'] . "</p>";
                echo "<p>Vehicle Name: " . $row['vehicle_name'] . "</p>";
                echo "<p>Capacity: " . $row['capacity'] . "</p>";
                echo "</div>";
                echo "<button class='select-btn' onclick='selectVehicle(" . $row['id'] . ", " . $row['capacity'] . ")'>Select</button>";
                echo "</div>";
            }
        } else {
            echo "No drivers found.";
        }

        $conn->close();
        ?>
    </div>
    
    <footer>
        <p>&copy; 2024 Vehicle Booking System. All rights reserved.</p>
    </footer>

    <script>
    function selectVehicle(vehicleId, vehicleCapacity) {
        let capacity = prompt("Enter the product capacity:");
        if (capacity > vehicleCapacity) {
            alert("Capacity exceeds vehicle limit!");
        } else {
            if (confirm("Confirm order?")) {
                window.location.href = "confirm_order.php?vehicleId=" + vehicleId + "&capacity=" + capacity;
            }
        }
    }
    </script>
</body>
</html>
