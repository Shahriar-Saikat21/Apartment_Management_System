<?php
    $con = mysqli_connect("localhost","root","","apartment_schema");

    if(!$con){
        echo "Connection Error". mysqli_connect_error();
    }
?>