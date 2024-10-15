<?php
if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    include'db_connection.php';
    $sql="SELECT password FROM admin_register WHERE email='$email'";
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
        session_start();
        $_SESSION['username']=$email;
        echo "<meta http-equiv='refresh' content='0;admin_dashboard.php'/>";
    }
else{
    echo "<script>alert('Invalid Username ot Password')</script>";
    echo "<meta http-equiv='refresh' content='0;admin_login.html'/>";
}
}
else{
    header("location:admin_login.html");
}
?>
