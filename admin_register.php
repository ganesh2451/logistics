<?php
if(isset($_POST['submit'])) 
{
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $repass = $_POST['repass'];

    include 'db_connection.php';
    if($password == $repass) 
    {
        $sql = "INSERT INTO admin_register (email, name, password) VALUES ('$email', '$name', '$password')";
        if($conn->query($sql)) 
        {
            echo "<script>alert('Data added successfully')</script>";
            echo "<meta http-equiv='refresh' content='0;user_login.html'/>";
        } 
        else 
        {
            echo "<script>alert('Error adding data')</script>";
            echo "<meta http-equiv='refresh' content='0;admin_register.html'/>";
        }
    } 
    else 
    {
        echo "<script>alert('Passwords do not match')</script>";
        echo "<meta http-equiv='refresh' content='0;admin_register.html'/>";
    }
}
else 
{
    header("location:admin_register.html");
}
?>
