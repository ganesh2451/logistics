<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <span><h1>Admin Dashboard</h1></span>
        
    </header>
    <main>
        <center><h2>Add Driver</h2></center>
        <form id="addDriverForm" action="add_driver.php" method="POST" enctype="multipart/form-data">
            <label for="driver_name">Name of Driver:</label>
            <input type="text" id="driver_name" name="driver_name" required>
            
            <label for="driver_phone">Phone Number of Driver:</label>
            <input type="text" id="driver_phone" name="driver_phone" required>
            
            <label for="vehicle_name">Vehicle Name:</label>
            <input type="text" id="vehicle_name" name="vehicle_name" required>
            
            <label for="vehicle_plate">Vehicle Plate Number:</label>
            <input type="text" id="vehicle_plate" name="vehicle_plate" required>
            
            <label for="capacity">Capacity of Vehicle:</label>
            <input type="text" id="capacity" name="capacity" required>
            
            <label for="vehicle_image">Vehicle Image:</label>
            <input type="file" id="vehicle_image" name="vehicle_image" accept="image/*" required>
            
            <button type="submit">Add Driver</button>
        </form>

        <center><h2>Driver List</h2></center>
        <div id="driverList">
            <?php include 'view_drivers.php'; ?>
        </div>

       
        
        <center><h2>Delete Driver</h2></center>
        <form id="deleteDriverForm" action="delete_driver.php" method="POST">
            <label for="driver_phone_delete">Number of the Driver:</label>
            <input type="text" id="driver_phone_delete" name="driver_phone" required>
            <button type="submit">Delete Driver</button>
        </form>

        <h2>All Bookings</h2>
        <div id="bookings">
            <?php include 'view_bookings.php'; ?>
        </div>
    </main>
     
    
</body>
</html>
