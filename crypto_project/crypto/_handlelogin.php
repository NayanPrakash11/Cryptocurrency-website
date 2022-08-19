<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = $_POST['loginusername'];
    $pass = $_POST['loginpass'];
    
    $sql = "select * from login_details where username='$username'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['password'])){
            // if($username==$row['username']){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            echo "logged in". $username;  
            header("Location: /crypto_project/index.php");
        } 
          else echo '<h1>incorrect password</h1>'; //header("Location: /crypto_project/about.php");
    }
    else
   header("Location: /crypto_project/index.php");
  
}

?>