<?php 
$server="localhost";
$user="root";
$password="";
$database="users";

try{
    $conn=mysqli_connect($server,$user,$password,$database);
}
catch(Exception $e){
    echo $e;
}
