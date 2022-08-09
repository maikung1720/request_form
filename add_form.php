<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
<h2>Request Form</h2>
<form method="post" id="insert" enctype="multipart/form-data">
    <div class="row">

    <br/>

    <div class="col-12">
        <label for="topic">Topic:</label>
        <input type="text" class="form-control" id="topic"  name="topic">
    </div>

    <br/>

    <div class="col-12" style="margin-top: 25px;">
        <label for="des">Description:</label>
        <input type="text" class="form-control" id="des"  name="des">
    </div>
    <br/>

    <div class="col-12" style="margin-top: 25px;">
        <label for="des">Upload Files:</label>
        <input type="file" class="form-control" id="file"  name="file" accept=".ppt,.pptx">
    </div>

    <div class="col-12" style="margin-top: 25px;">
        <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
    </div>
    
</form>
</div>
<script type="text/javascript">
  $("#insert").submit(function (event) {
    var formData = new FormData()
    formData.append('file', $("#file")[0].files[0]);
    formData.append('topic', $("#topic").val());
    formData.append('des', $("#des").val());

    $.ajax({
      type: "POST",
      url: "process.php",
      data: formData,
      contentType:false,
      processData:false,
      success:function (response){
        alert("Upload Success!!!")
        console.log('Response '+response);
      },
      error: function (jqXHR, textStatus, errorThrown) { 
        errorFunction(); 
        alert("Error")
      }
    }).done(function (data) {
      location.reload();
    });

    event.preventDefault();
  });
</script>
</body>
</html>
