<?php
 include 'crypto/_dbconnect.php';
 $name = $_POST['name'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $message = $_POST['message'];
$conn = mysqli_connect("localhost", "root", "", "crypto") or die("Connection Error: " . mysqli_error($conn));
mysqli_query($conn, "INSERT INTO contact (name , email , phone , message) VALUES ('" . $name. "', '" . $email. "','" . $phone. "','" . $message. "')");
$insert_id = mysqli_insert_id($conn);
if(!empty($insert_id)) {
$message1 = "Your contact information is saved successfully";
}
echo 'Thank you for contacting us! <br> Wishing you a nice day<br>';

header( "refresh:10;url=index.php" );

echo 'You will be redirected in 10 seconds. <br> If not please click <a href="index.php">here</a>.';
?>