<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.10/dist/sweetalert2.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.10/dist/sweetalert2.all.min.js"></script>
  <style>
    #td1{
      font-size: 15pt;
      padding:5px ;
      border-bottom:1px solid blue;
    }
    #td2{
      font-size: 15pt;
      padding:5px ;
      border-bottom:1px solid blue;
    }
    #td3{
      font-size: 15pt;
      padding:5px ;
      border-bottom:1px solid blue;
    }
    #td4{
      font-size: 15pt;
      padding:5px ;
      border-bottom:1px solid blue;
      
    }
    .qty{
      width: 50%;
      border-radius: 15px;
    }
    .input{
      border: none;
      background-color: transparent;
      width: 63%;
    }
    .inp3{
      border: none;
      background-color: transparent;
      width: 63%;
    }
    .button-container {
        position: absolute;
        top: 5%;
        right: 5%;
        transform: translate(50%, -50%);
    }

    .btn {
        display: inline-block;
        padding: 12px 24px;
        font-size: 16px;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        border-radius: 8px;
        background-color: #f39c12; /* Warm yellow color */
        color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn:hover {
        background-color: #e67e22; /* Darker yellow/orange on hover */
        transform: translateY(-2px); /* Slight lift on hover */
    }

    .btn:active {
        background-color: #d35400; /* Even darker orange when pressed */
        transform: translateY(1px); /* Pressed effect */
    }

    .btn:focus {
        outline: none;
    }
  </style>
  <?php include "boot.php";
  ?>

</head>
<body>
 
 <!-- start add img -->
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
  <div id="report">
    <div class="container-fluid ml-5">
      <div class="col-md-12">
        <div class="row">

          <div class="col-md-6" id="rrep">

           
            <?php include"view.php" ?>
          </div>
          <!-- end -->
          <div class="col-md-6">
            <h3>Item Selected</h3>
            <!-- <div id="show" style="display: none;padding:0%;" class="alert alert-success alert-dismissible fade show" role="alert">
              <strong id="alert"></strong> 
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> -->
            <div id="table">
            </div>
             
            <p style="margin-left:73%; font-weight: bold;"></span>Total: $<span id="total"></span></p>
     
<div class="button-container" style="margin-top:30%">
    <a href="reports.php" class="btn btn-warning">Report</a>
</div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
<script>
  
 $(document).ready(function () {
    // Using event delegation: Attach the submit event listener to a parent element
    $(document).on('submit', '#imageUploadForm', function (e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = new FormData(this); // Create FormData from the form

        $.ajax({
            type: 'POST',
            url: 'upload2.php', // Directly specify the PHP file for form submission
            data: formData,
            cache: false,
            contentType: false, // This ensures the content type is not set automatically
            processData: false, // This ensures the data is not processed as a query string
            success: function (data) {
                // On success, load new content into #rrep (view.php is loaded here)
                $("#rrep").load("view.php");
              // alert(data)
                 Swal.fire({
                title: 'Success!',
                text: data,  // Display the response from the server
                icon: 'success',
                confirmButtonText: 'OK'
            });
            },
            error: function (data) {
                console.log("Error");
                console.log(data); // Log any error that occurred during the AJAX request
            }
        });
    });
});


 
</script>
<?php  
include "ajax.php";
$t=new table();
$t->table();

?>
