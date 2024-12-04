<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
 <button type="button" class="btn btn-primary pl-2" data-bs-toggle="modal" data-bs-target="#modal">Add New
          </button>
<div class="modal" tabindex="-1" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="imageUploadForm"  method="post" enctype="multipart/form-data">
      <div class="modal-body">
<div class="row">
<div class="col-md-6 mb-3">
          <label  class="form-label">name</label>
          <input type="text" id="i_name" class="form-control" name="i_name" placeholder="Enter magac-Item" />
        </div>

   <div class="col-md-6 mb-3">
          <label  class="form-label">type</label>
          <input type="text" id="i_type" class="form-control" name="i_type" placeholder="type" />
        </div>
</div>
       
<div class="row">
<div class="col-md-6 mb-3">
          <label  class="form-label">price</label>
          <input type="number" id="i_price" class="form-control" name="i_price" placeholder="Enter $......." />
        </div>

        <div class="col-md-6 mb-3">
          <label  class="form-label">Status</label>
          <select name="i_statuss" id="i_statuss" class="form-control"> 
            <option value="">choose</option>
            <option value="Available">Available</option>
            <option value="Un-Available">Un-Available</option>
          </select>
        </div>
</div>
 <div class="row">

        <div class="col-md-6 mb-3">
          <label  class="form-label">Image</label>
          <input type="file"  id="txtfile" class="form-control" name="txtfile" />
        </div>
 </div>
      </div>
      <div class="modal-footer">
      <button type="submit" name="save" class="btn btn-primary" id="bs">Save</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('#imageUploadForm').on('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission

            var formData = new FormData(this); // Create FormData from the form

            $.ajax({
                type: 'POST',
                url: 'upload2.php', // Directly specify the PHP file
                data: formData,
                cache: false,
                contentType: false, // This ensures the content type is not set automatically
                processData: false, // This ensures the data is not processed as a query string
                success: function (data) {
                  alert(data) // Optionally, display the response in a div
                },
                error: function (data) {
                    console.log("Error");
                    console.log(data); // Log any error that occurred
                }
            });
        });

        // This triggers the form submit when the file is changed
        $("#ImageBrowse").on("change", function () {
            $("#imageUploadForm").submit();
        });
    });
</script>

</script>
