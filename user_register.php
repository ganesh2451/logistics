<?php
if(isset($_POST['register'])) 
{
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $repass = $_POST['repass'];

    include 'db_connection.php';
    if($password == $repass) 
    {
        $sql = "INSERT INTO user_register (email, name,phone_number, password) VALUES ('$email', '$name','$phone_number', '$password')";
        if($conn->query($sql)) 
        {
            echo "<script>alert('Data added successfully')</script>";
            echo "<meta http-equiv='refresh' content='0;user_login.html'/>";
        } 
        else 
        {
            echo "<script>alert('Error adding data')</script>";
            echo "<meta http-equiv='refresh' content='0;user_register.html'/>";
        }
    } 
    else 
    {
        echo "<script>alert('Passwords do not match')</script>";
        echo "<meta http-equiv='refresh' content='0;user_register.html'/>";
    }
}
else 
{
    header("location:user_register.html");
}
?>
