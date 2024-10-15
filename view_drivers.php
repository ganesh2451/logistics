<?php
include 'db_connection.php';

$sql = "SELECT * FROM vehicle";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Driver Name</th>
                <th>Phone Number</th>
                <th>Vehicle Name</th>
                <th>Vehicle Plate Number</th>
                <th>Capacity</th>
                
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['driver_name']) . "</td>
                <td>" . htmlspecialchars($row['driver_phone']) . "</td>
                <td>" . htmlspecialchars($row['vehicle_name']) . "</td>
                <td>" . htmlspecialchars($row['vehicle_plate']) . "</td>
                <td>" . htmlspecialchars($row['capacity']) . "</td>
                
              </tr>";
    }
    echo "</table>";
} else {
    echo "No drivers found";
}

$conn->close();
?>
