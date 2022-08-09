<?php
    include("dbconfig.php");
    $id = $_POST['edit_id'];
    $sql ="SELECT * FROM request WHERE ID = $id";
    $rs = mysqli_query($conn,$sql);
    while ($result =mysqli_fetch_array($rs)){
            $id =$result['ID'];
            $topic = $result['Topic'];
            $des = $result['Description'];
    }

?>

<div class="row">
    <input type="hidden" name="edit_id" id="edit_id" value=<?=$id?>>
                <div class="col-6" style="margin: 25px;">
                  <label for="topic">Topic:</label>
                  <input type="text" class="form-control" id="topic" name="topic" value=<?=$topic?>>
                </div>
    
                <div class="col-6" style="margin: 25px;">
                  <label for="des">Description:</label>
                  <input type="text" class="form-control" id="des" name="des" value=<?=$des?>>
                </div>
     
                <div class="col-6" style="margin: 25px;">
                  <label for="des">Upload Files:</label>
                  <input type="file" class="form-control" id="file" name="file" accept=".ppt,.pptx">
                </div>
          </div>
