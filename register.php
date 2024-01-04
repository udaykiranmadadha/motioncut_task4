<?php
$user_name =$_POST['name'];
$email =$_POST['email'];
$phn_no =$_POST['phnno'];
$user_id =$_POST['username'];
$password =$_POST['password'];
$db =mysqli_connect('localhost','root','','todolist');
$sql="INSERT INTO user_details(user_name, email,phn_no, user_id,password) VALUES('$user_name','$email', '$phn_no','$user_id','$password')";
mysqli_query($db,$sql);
echo "<script type='text/javascript'>window.location.href='confirmation.html';</script>";


?>