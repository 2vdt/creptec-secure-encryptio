<?php include "DB_connection.php" ?>

<?php
//starting the session
session_start();

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confrim_pass = $_POST['confirm-password'];

    if($password === $confrim_pass){

        $query = "INSERT INTO user(name, email, password) ";
        $query .= "VALUES('$name','$email', '$password')";

        $result = mysqli_query($conn, $query);
    
        if(!$result) {
            die("Query Failed .. !" . mysqli_error($conn));
        }else{
            header("location: login.php");
            echo "<p style='font-size:16px; font-weight:bold;color:black' class='alert alert-success'>Account has been Created.</p>";
        }

    }else{
        header("location: login.php");
        echo "<p style='font-size:16px; font-weight:bold;color:black' class='alert alert-danger'>Passwords Not Matched.</p>";
    }

}


?>