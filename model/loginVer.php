<?php
  include 'db.php';
 
   $usernameNow = $_POST['username'];
   $passwordNow = md5($_POST['password']);

   $sql = "SELECT * FROM anggota WHERE username='$usernameNow'";

   $result = $mysqli->query($sql);
   if($result && $result->num_rows > 0){
       $row = $result->fetch_array();
        if($passwordNow == $row['password']){
            include 'userClass.php';
            $_SESSION['user'] = new User($name , $username);
            header("Location: ../pages/user/usr.php");
        }else{
            header("Location: ../pages/general/login.php?statusSalah=1");
            // echo "wrong password";
        }

   }else{
    header("Location: ../pages/general/login.php?statusSalah=2");
    //   echo "wrong username";
   }


?>  