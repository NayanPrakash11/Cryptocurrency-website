<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = $_POST['username'];
    $email = $_POST['signupemail'];
    $pass = $_POST['signupPassword'];
    $name = $_POST['signupname'];
    $cpass = $_POST['signupcPassword'];

    // Check whether this username exists
    $existSql = "SELECT * FROM login_details WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "username already exists";
    }
    else{
        if($pass == $cpass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `login_details` (`username`, `email_id`, `password`, `Name`, `timestamp`) VALUES ('$username', '$email', '$hash', '$name', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
               header("Location: /crypto_project/index.php?signupsuccess=true");
                exit();
            }

        }
        else{
            $showError = "Passwords do not match"; 
            
        }
    }
    header("Location: /crypto_project/index.php?signupsuccess=false&error=$showError");

}
?>