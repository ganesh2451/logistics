<?php
include 'db_connection.php';

// Example query to fetch all bookings
$sql = "SELECT * FROM booking";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>My Bookings</h1>";
    echo "<table border='1'>
            <tr>
                <th>Date</th>
                <th>Pick Up Address</th>
                <th>Drop Off Address</th>
                <th>Size of Product</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['date']) . "</td>
                <td>" . htmlspecialchars($row['address_pickup']) . "</td>
                <td>" . htmlspecialchars($row['address_drop']) . "</td>
                <td>" . htmlspecialchars($row['size_of_product']) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No bookings found";
}

$conn->close();
?>
