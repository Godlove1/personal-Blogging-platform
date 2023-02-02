<?php

    if(!isset($_SESSION['user']))  {
        //User is not logged in
        //orangeirect to login page with message
  
        //orangeirect to Login Page
        header('location:login');
        exit();

    }


?>