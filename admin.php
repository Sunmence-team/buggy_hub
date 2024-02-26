<?php

include "db_conn.php";

$sql = "SELECT * FROM `hub`";
$result = $conn->query($sql);



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="icons files/css/all.css">
</head>
<style>
    img{
        width: 200px;
        height: 200px;
    }
    table{
        width: 100%;
        border: 1px solid black;
        border-collapse: collapse;
    }
    tr th{
        padding: 20px;
        border: 2px solid #000;
    }
    tr td{
        padding: 20px;
        border: 2px solid #000;
    }
    button{
        padding: 10px 30px;
        background: #796fab;
        color: #fff;
        font-size: 18px;
        border: 1px solid #000;
        border-radius: 5px;
    }
</style>
<body>
    <div id="message-container">
        
    </div>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Ratings</th>
            <th>How you found us</th>
            <th>How we can improve</th>
            <th>What do you enjoy about buggy hub</th>
        </tr>
   
       <?php

    

         while ($row = $result->fetch_assoc()){
        ?>
        
        <tr>
            <td><?php echo $row["id"]?></td>
            <td><?php echo $row["name"];?></td>
            <td><?php echo $row["email"]?></td>
            <td><?php echo $row["ratings"];?></td>
            <td><?php echo $row["select_item"];?></td>
            <td><?php echo $row["suggestions"];?></td>
            <td><?php echo $row["message"];?></td>
             
            <td id="row_<?php echo $row["id"]; ?>">
               <form method="post" action="admin.php">
                  <input type="hidden" name="delete" value="<?php echo $row["email"]; ?>">
                  <button type="submit" name="submitDelete" onclick="deleteRow(<?php echo $row['id']; ?>)">Delete</button>
               </form>
           </td>

        </tr>

        <?php } ?>
    </table>
    
    
<?php
   if ($result->num_rows > 0){
      } 
      else{
        echo "No record found";
      }
      if (isset($_POST["submitDelete"])) {
        $email = $_POST["delete"];
    
        $sql = "DELETE FROM `hub` WHERE `email` = '$email'";
    
        if ($conn->query($sql) === TRUE) {
            echo '<script>document.getElementById("message-container").innerHTML = "Record deleted successfully";</script>';
        } else {
            echo '<script>document.getElementById("message-container").innerHTML = "Error deleting record: ' . $conn->error . '";</script>';
        }
    
        exit(); 
    }


    
?>



 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
</body>
</html>
