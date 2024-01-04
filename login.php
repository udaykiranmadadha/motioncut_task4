<?php
session_start();
$user_id =$_POST['username'];
$password =$_POST['password'];
$_SESSION['user_id'] = $user_id; // $user_id is the user ID retrieved from the database

//create connection
$db =mysqli_connect('localhost','root','','todolist');
$sql = "SELECT * from user_details where user_id = '$user_id' AND password = '$password'"; 
$result = mysqli_query($db,$sql);

// Redirect to the task addition page

if ($result->num_rows == 1) {
    echo "<script type='text/javascript'>alert('Login sucess');window.location.href='Home.html';</script>";
    header("Location: home.php");

    exit();
} else {
    echo "<script type='text/javascript'>alert('Inalid Password or User id');window.location.href='Login.html';</script>";
}

?>

