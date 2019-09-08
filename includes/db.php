<?php

     $db_host = 'localhost';
     $db_uname = 'root';
     $db_pword = '';
     $db_name = 'stop_n_stay';

     global $conn;

     $conn = mysqli_connect($db_host, $db_uname, $db_pword, $db_name);

     if (mysqli_connect_errno()) {
          echo "Failed to Connect: ".mysqli_connect_errorno();
     }