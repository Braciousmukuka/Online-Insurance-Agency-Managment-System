<?php
$conn = mysqli_connect("localhost","root","Mubanga0205","insurance_sys");

if(!$conn){
    echo'connection error'. mysqli_connect_error();
}