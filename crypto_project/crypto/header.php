<?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/crypto_project">Be-Cryptic</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/crypto_project">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">DETAILED VIEW</a>
      </li>
      <li class="nav-item ">
      <a class="nav-link" href="market.php">MARKET</a>
        </a>
      </li>
      <li class="nav-item" >
        <a href="contact.php" class="nav-link  ">CONTACT</a>
      </li>
      <div class= "row mx-2">';
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<form class="form-inline my-2 my-lg-0" action= "/crypto_project/search.php" method="get">
          <input class="form-control mr-sm-2" name="search"  href="search.php" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success my-2 my-sm-0" type="submit" > Search</button>
            <p class="text-light my-0 mx-2">Welcome '. $_SESSION['username']. '</p>
            <a href="crypto/_logout.php" class="btn btn-outline-success ml-2">Logout</a>
            </form>';
      }
      else{ 
        echo '
        <form class="form-inline my-2 my-lg-0" >
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success my-2 my-sm-0" type="submit" >Search</button>
          </form>
          <button class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#loginmodal">Login</button>
          <button class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#signupmodal">Signup</button>';
        }
  echo '</div>
        </div>
        </nav>';
include 'crypto/_loginmodal.php';
include 'crypto/_signupmodal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
   echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> You can now login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>';
}          
?>