<?php
include 'db_connection.php';

// Example query to fetch all vehicles
$sql = "SELECT * FROM vehicle";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>All Vehicles</h1>";
    echo "<table border='1'>
            <tr>
                <th>Driver Name</th>
                <th>Driver Phone</th>
                <th>Vehicle Name</th>
                <th>Vehicle Plate Number</th>
                <th>Vehicle Photo</th>
                <th>Capacity</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['name_of_driver']) . "</td>
                <td>" . htmlspecialchars($row['phone_number_of_driver']) . "</td>
                <td>" . htmlspecialchars($row['model_name']) . "</td>
                <td>" . htmlspecialchars($row['vehicle_plate_number']) . "</td>
                <td><img src='" . htmlspecialchars($row['vehicle_photo']) . "' alt='Vehicle Photo' width='100'></td>
                <td>" . htmlspecialchars($row['capacity']) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No vehicles found";
}

$conn->close();
?>
