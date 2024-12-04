<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php include"boot.php" ?>
  <style>
    .bal{
      margin-left: 300px;
    }
    .date{
      margin-left: 350px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row ">
      <div class="col">
        <h3 class="text-center">Balance Sheet</h3>
        <h6 class="text-center"><span>date:<?php echo date("Y");?></span></h6>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col text-center">
      <h5>Asset</h3>
      <hr>
      </div>
      <div class="col text-center">
        <h5>Liability</h3>
        <hr>
      </div>
      <div class="col text-center">
        <h5>Owner-Equity</h3>
        <hr>
      </div>
    </div>
  </div>
</body>
</html>