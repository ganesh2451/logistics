<?php
if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    include'db_connection.php';
    $sql="SELECT password FROM user_register WHERE email='$email'";
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
        session_start();
        $_SESSION['email']=$email;
        echo "<meta http-equiv='refresh' content='0;booking.html'/>";
    }
else{
    echo "<script>alert('Invalid Username ot Password')</script>";
    echo "<meta http-equiv='refresh' content='0;user_login.html'/>";
}
}
else{
    header("location:user_login.php");
}
?>
