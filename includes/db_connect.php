<?php
$conn = mysqli_connect("localhost","root","","insurance_sys");

if(!$conn){
    echo'connection error'. mysqli_connect_error();
}