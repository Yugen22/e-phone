<?php
    $host = "localhost";
    $user = "root";             
    $password = "";       
    $database = "e-phone";                      

    $sambungan = mysqli_connect($host, $user, $password, $database)
    or die("Sambungan gagal");
?>