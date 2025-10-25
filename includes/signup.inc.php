<?php
require_once "../Classes/Dbh.php";
require_once "../Classes/index.php";

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
   

    //Create object of Signup class
    $signup = new Signup($username, $pwd);

    $signup->signupUser();

}