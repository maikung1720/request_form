<?php 
    print_r($_POST);
    print_r($_FILES);
    ini_set('display_errors',0); // hide warning
    include("dbconfig.php");

    $topic =$_POST['topic'];
    $des =$_POST['des'];
    $target='uploads/';
    $target_dir = "uploads/";
    $file_name=$_FILES["file"]["name"];
    $file_tmp=$_FILES["file"]["tmp_name"];

    
    $new_file_name = 'empid'.'_'.$file_name;
    if(!file_exists($target.$new_file_name)){
        if (move_uploaded_file($file_tmp, $target.$new_file_name))
        {
          $sql = "INSERT INTO request (Topic, Description, Files) VALUES (' $topic', ' $des', '$new_file_name')";
          $rs = mysqli_query($conn, $sql);
          if($rs){
            echo "Add Request Successful";
          }
            exit();
        }else
        {
        echo "Add Request Failed";
        }
    }else{
      $new_file_name = 'empid'.'_'.time().'_'.$file_name;
      if (move_uploaded_file($file_tmp, $target.$new_file_name))
        {
          $sql = "INSERT INTO request (Topic, Description, Files) VALUES (' $topic', ' $des', '$new_file_name')";
          $rs = mysqli_query($conn, $sql);
          if($rs){
            echo "Add Request Successful";
          }
            exit();
        }else
        {
        echo "Add Request Failed";
        }
    }
