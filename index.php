<?php
include("dbconfig.php");
$sql = "SELECT * FROM request";
$rs = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">
    <h2>Request Table</h2>
    <a href="add_form.php" style="float: right;">+ Add Request</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Topic</th>
          <th>Description</th>
          <th>Files</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($rs as $result) {
        ?>
          <tr>
            <td><?= $result['Topic'] ?></td>
            <td><?= $result['Description'] ?></td>
            <td><?= $result['Files'] ?></td>
            <td><button type="button" class="btn btn-info btn-lg view_data" id='"<?= $result['ID'] ?>"'>Open Modal</button>
          </td>
          </tr>
        <?php
        }
        ?>

      </tbody>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Request</h4>
          </div>
          <div class="modal-body" id="detail">

        </div>
                  
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="update">Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

      </div>
    </div>
  </div>

  <button class="btn btn-primary" id="Click">Click</button>

<script type="text/javascript">
var id =24;
var a ="Mai"

$.ajax({
      type: "POST",
      url: "detail.php",
      data: {id:id},
      success:function (response,data){
        a = response;
      },
      error: function (jqXHR, textStatus, errorThrown) { 
        errorFunction(); 
        alert("Error")
      }
})

$(document).ready(function(){
  var x="mai";

  $(".view_data").click(function(){
    //$("#myModal").modal("show");
    var edit_id = $(this).attr("id");
    
    $.ajax({
      type: "POST",
      url: "select.php",
      data: {
        edit_id:edit_id,
      },
      success:function (data){
        $("#detail").html(data);
        $("#myModal").modal("show");
      },
      error: function (jqXHR, textStatus, errorThrown) { 
        errorFunction(); 
        alert("Error")
      }
    })
  });


  $("#update").click(function (event) {
    var formData = new FormData()
    formData.append('topic', $("#topic").val());
    formData.append('des', $("#des").val());
    $.ajax({
      type: "POST",
      url: "process_update.php",
      data: formData,
      contentType:false,
      processData:false,
      success:function (response){
        console.log('Response '+response);
      },
      error: function (jqXHR, textStatus, errorThrown) { 
        errorFunction(); 
        alert("Error")
      }
    })
    event.preventDefault();
  });


  $("#Click").click(function (event) {
    alert(a);
  });


});




</script>
</body>

</html>