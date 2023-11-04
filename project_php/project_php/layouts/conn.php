<?php 
    $hostname="localhost";
    $username="root";
    $password="";
    $dbname="project_php";

  $conn = mysqli_connect($hostname,$username,$password,$dbname);

  if(!$conn){
    echo "Database Connect Failed ";
  }else{
    //  echo "Database Connect Falied";
  }

?>