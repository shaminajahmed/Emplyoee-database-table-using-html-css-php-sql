
<?php 
    include('layouts/conn.php');

    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $title=$_POST['title'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $country=$_POST['country'];
        $joing_date=$_POST['joing_date'];
        $salary=$_POST['salary'];

    $sql="INSERT INTO employee(name,title,address,city,country,joing_date,salary)VALUES('$name','$title','$address','$city',' $country','  $joing_date','$salary')";

    $result=mysqli_query($conn,$sql);

    if($result){
        echo "Data Insered";
    }else{
        echo "Data Not Inserted";
    }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Insert </title>
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
        <label>Name</label><input type="text" name="name">
        <label>Title</label><input type="text" name="title">
        <label>Address</label><input type="text" name="address">
        <label>City</label><input type="text" name="city">
        <label>Country</label><input type="text" name="country">
        <label>Joing Date</label><input type="text" name="joing_date">
        <label>Salary</label><input type="text" name="salary">
        <input type="submit" value="Submit" name="submit">
    </form>
    <!-- view data -->
    <table border=1>
        <h2>View All Data</h2> 
        <thead>
            <tr>
                <th>Name</th>
                <th>Title</th>
                <th>Address</th>
                <th>City</th>
                <th>Country</th>
                <th>Joing Date</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody> 
        <?php 
        include('layouts/conn.php');
        $sql="SELECT * FROM employee";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){ 

        ?>
            <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><?php echo $row['city'];?></td>
                <td><?php echo $row['country'];?></td>
                <td><?php echo $row['joing_date'];?></td>
                 <td><?php echo $row['salary'];?></td>
                 <td>
                    <a href="edit.php?id=<?php echo $row['id'];?>">Edit</a>
                    <a href="index.php?id=<?php echo $row['id'];?>">Delete</a>
                 </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    <!-- delete section -->
    <?php  
        if(isset($_GET['id'])){
            $id=$_GET['id'];

            $sql="DELETE FROM employee WHERE id='$id'";
            $result=mysqli_query($conn,$sql);

            if($result){
                echo "Data Delete Success";
            }else{
                echo "Data Deleted Failed";
            }
        }
    ?>
</body>
</html>