<?php include('server.php');

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query ($db, "SELECT * FROM info WHERE idinfo=$id" );
    $record = mysqli_fetch_array($rec);
    $name = $record ['name'];
    $address = $record['address'];
    $id = $record['idinfo'];
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
 <body>

    <?php if (isset($_SESSION['msg'])):?>

    <div class = "msg">

    <?php 

        echo $_SESSION['msg'];
        unset($_SESSION['msg']);

    ?>
    
</div>

    <?php endif ?>


    <table>
    <thead>
    <tr>
    
        <th>Name</th>
        <th>Address</th>
        <th colspan = "2">Action</th>
    
    </tr>

    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_array($results))
        {?>
    
        <tr>
        
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['address'];?> </td >
        
        <td>
    
        <a class = "edit_btn" href="index.php?edit=<?php echo $row['idinfo'];?>">Edit</a>
    
        </td>
        
        <td>
        
        <a class="del_btn" href="index.php?del=<?php echo $row['idinfo']; ?>">Delete</a>
        
        </td>
        </tr>



    <?php }?>

      
    </tbody>
    </table>

    <form action = "server.php" method = "post" >
    
        <input type="hidden" name="idinfo" value = "<?php echo $id;?>">    
    
    <div class="input-group">
       
        <label>Name</label>
        <input type="text" name="name" value = "<?php echo $name;?>">
       
        </div>

        <div class="input-group">
       
            <label>Address</label>
                <input type="text" name="address" value = "<?php echo $address;?>">
       
        </div>

        <div class="input-group">
       
            <?php if($edit_state == false):?>
                <button type = "sumbit" name= "save" class="btn">Save</button>

            <?php else:?>
                <button type = "sumbit" name= "update" class="btn">Update</button>

            <?php endif ?>
        
        </div>

    </form>

</body>
</html> 
 
 
 
