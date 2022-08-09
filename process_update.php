<?php 
    include("dbconfig.php");
    $edit_id = $_POST['edit_id'];
    $topic =$_POST['topic'];
    $des =$_POST['des'];
    $sql = "Update request SET Topic = '$topic', Description='$des' WHERE ID = $edit_id";
          $rs = mysqli_query($conn, $sql);
          if($rs){
            echo "Update Request Successful";
        }else
        {
        echo "Update Request Failed";
        }
    ?>
