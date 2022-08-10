<?php 
    include("dbconfig.php");
    print_r($_POST);
    $id = $_POST['id'];;
    $sql = "SELECT * FROM request WHERE ID = $id";
    $result = mysqli_query($conn, $sql);
    $rows = array();
    while($rs = mysqli_fetch_array($result)) {
    $rows[] = ['Topic' => $row['Topic']];
    }
  echo json_encode($rows);
    ?>