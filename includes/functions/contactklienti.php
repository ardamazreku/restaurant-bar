<?php

require "includes/functions/connect.php";

if(isset( $_POST['name']))
$name = $_POST['name'];
if(isset( $_POST['email']))
$email = $_POST['email'];
if(isset( $_POST['message']))
$message = $_POST['message'];

$query="Insert into contact(klienti,mesazhi,admin)values('$email','$message',1);";
$res=mysqli_query($connect,$query);

?>