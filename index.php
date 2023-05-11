<?php
include 'db_connect.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["user"];
    $pass=$_POST["psd"];
    $hashPas=password_hash($pass,PASSWORD_DEFAULT);
    $sql="select *from accounts where username='$username'";
    try{
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)==1){
            echo "Username Already Exits";
        }
        else{
            $sql="insert into accounts values('$username','$hashPas');";
            try{
                mysqli_query($conn,$sql);
                echo "Registered Successfully";
            }
            catch(Exception $e){
                echo "Error in Registrations!";
            }
        }
    }
    catch(Exception $e){
        echo $e;
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
    <h1>REGISTER</h1>
    <br>
    <a href="login.php">Already a User?</a>
    <br><br>
    <form action="#" method="post">
        <label for="user">User</label>
        <input type="text" id="user" name="user" required>
        <label for="psd">Password</label>
        <input type="password" id="psd" name="psd" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>