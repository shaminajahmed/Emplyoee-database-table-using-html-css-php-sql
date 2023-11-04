<?php 
   include('layouts/conn.php');
   if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM employee WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
   }

//  edit section
   if(isset($_POST['edit'])){ 
    $name=$_POST['name'];
    $title=$_POST['title'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $joing_date=$_POST['joing_date'];
    $salary=$_POST['salary'];

    $sql="UPDATE employee SET name='$name',title='$title',address='$address',city='$city',country='$country',joing_date='$joing_date',salary='$salary'WHERE id='$id'";

    $result=mysqli_query($conn,$sql);

    if($result){
        echo "Data Updated";
    }else{
        echo "Data Not Updated";
    }


   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eidt Page</title>
    <style> 
       form{ 
        width:400px;
        height:auto;
        background-color:gray;
        padding-bottom:50px;
        margin:auto;
       } 
       label{
        display:block;
        margin-left:40px;
       }
       input{
        width:300px;
        padding:5px;
        border-radius:5px;
        margin-left:40px;
       }
       input[type="submit"]{
        margin-top:5px;
       }
       h2{ 
        text-align:center;
        padding-top:20px;
       }
       table{ 
        width:1000px;
        height:auto;
        margin:auto;
       }
   </style>
</head>
<body>
<form action="" method="POST"> 
        <h2>Employee Form</h2>
        <label>Name</label><input type="text" name="name" value="<?php echo $row['name'];?>">
        <label>Title</label><input type="text" name="title"  value="<?php echo $row['title'];?>">
        <label>Address</label><input type="text" name="address" value="<?php echo $row['address'];?>">
        <label>City</label><input type="text" name="city" value="<?php echo $row['city'];?>">
        <label>Country</label><input type="text" name="country" value="<?php echo $row['country'];?>">
        <label>Joing Date</label><input type="text" name="joing_date" value="<?php echo $row['joing_date'];?>">
        <label>Salary</label><input type="text" name="salary" value="<?php echo $row['salary'];?>">
        <input type="submit" value="Submit" name="edit">
    </form>
</body>
</html>