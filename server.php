<?php

    session_start();

    $name = "";
    $address = "";
    $id = 0;
    $edit_state = false;

    $db = mysqli_connect('localhost', 'root', 'root', 'stdb');


if (isset($_POST['save']))
 {
    $name = $_POST['name'];
   
    $address = $_POST['address'];
    
    $query = "INSERT INTO info (name, address) VALUES('$name','$address')";
    
    mysqli_query($db, $query);
    
    $_SESSION['msg'] = "Address saved";
    
    header('location: index.php');
}
     
    if(isset($_POST['update']))
{
        $name = $_POST['name'];
     
        $address =$_POST['address'];
     
        $id = $_POST['idinfo'];
         
        mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE idinfo=$id");
          
        $_SESSION['msg'] = "Address update";

        header('location: index.php');
      
}

    if(isset($_GET['del']))
{
            $id = $_GET['del'];
        
            mysqli_query($db, "DELETE FROM info WHERE idinfo=$id");
        
            $_SESSION['msg'] = "Address deleted";
        
            header('location: index.php');
}

    $results = mysqli_query($db, 'SELECT * FROM info');


?>