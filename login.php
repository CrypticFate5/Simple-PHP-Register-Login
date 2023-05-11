<?php
include 'db_connect.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["user"];
    $pass=$_POST["psd"];
    $sql="select *from accounts where username='$username'";
    try{
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)==1){
            $dat=mysqli_fetch_assoc($res);
            $hashPas=$dat["password"];
            if(password_verify($pass,$hashPas)){
                header("location:home.php");
            }
            else{
                echo "Password Invalid";
            }
        }
        else{
            echo "Invalid Credentials";
        }
    }
    catch(Exception $e){
        echo "Sorry,server side error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timepass</title>
</head>
<body>
    <form action="#" method="post">
        <label for="user">User</label>
        <input type="text" id="user" name="user" required>
        <label for="psd">Password</label>
        <input type="password" id="psd" name="psd" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>