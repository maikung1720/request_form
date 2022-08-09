<?php
 $hostName = "localhost";
 $userName = "root";
 $passWord = "";
 $dbName = "requestDB";
 $conn = mysqli_connect($hostName, $userName, $passWord, $dbName);

 if(mysqli_connect_error()){
 echo "Connect falied : " .mysqli_connect_error();
 }else{
    //echo "Connect Successfully." ;
 }