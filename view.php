<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS - Image Gallery</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            font-size: 16px; /* Bigger base font size for POS clarity */
        }

        .container {
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-size: 1.2rem; /* Larger font size for buttons */
            padding: 10px 20px; /* Larger padding for buttons */
            border-radius: 6px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .modal-body {
            padding: 15px;
        }

        .col-md-4 {
            margin-bottom: 15px;
        }

        .image-card {
            border: 1px solid #ddd;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .image-card:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .image-card img {
            border-radius: 8px;
            margin-bottom: 10px;
            width: 120px; /* Larger image size */
            height: 120px;
            object-fit: cover;
        }

        .magac {
            font-size: 1.2rem; /* Larger font size for item name */
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .qiimo {
            font-size: 1rem; /* Standard font size for price */
            color: #555;
            margin-bottom: 10px;
        }

        .qty {
            margin-top: 10px;
            text-align: center;
            padding: 8px;
            width: 70%; /* Wider input field */
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem; /* Larger font size for input */
        }

        .add {
            background-color: #28a745;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 1rem; /* Larger font size for button */
        }

        .add:hover {
            background-color: #218838;
        }

        .text-center {
            text-align: center;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>POS System</h1>
        </div>

        <div class="col-md-12 text-center mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">Add New Item</button>
        </div>

        <div class="row">
            <?php
            include "Codes.php";
            $co = new Codes();
            $co->setConnect();
            $sql = "SELECT * FROM images";
            $result = $co->db->query($sql);
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            ?>
                <div class="col-md-4">
                    <div class="image-card">
                        <img src="<?php echo $row['img'] ?>" alt="Product Image">
                        <h4 class="magac"><?php echo $row['name'] ?></h4>
                        <h5 class="qiimo"><?php echo $row['price'] ?></h5>
                        <input type="number" class="qty" placeholder="Enter Qty">
                        <p><button class="btn add mt-3">Add to Cart</button></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>