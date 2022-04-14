<?php

// configurasi database
$DBHOST = 'localhost';
$DBUSERNAME = 'root';
$DBPASSWORD = '';
$DBNAME = 'perpus';
$conn = mysqli_connect($DBHOST, $DBUSERNAME, $DBPASSWORD, $DBNAME);

session_start();
