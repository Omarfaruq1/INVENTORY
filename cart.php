<?php
session_start(); // Start the session to store cart data

// Define the Cart class to manage cart operations
class Cart {
    public function addToCart($productId, $name, $price, $qty) {
        if (isset($_SESSION['cart'][$productId])) {
            // Update quantity if product is already in the cart
            $_SESSION['cart'][$productId]['quantity'] += $qty;
        } else {
            // Add new product to the cart
            $_SESSION['cart'][$productId] = [
                'name' => $name,
                'price' => $price,
                'quantity' => $qty
            ];
        }
    }

    public function getCartItems() {
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }

    public function clearCart() {
        unset($_SESSION['cart']);
    }
}

// Handle adding to the cart when a request is made
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $cart = new Cart();
    $cart->addToCart($productId, $name, $price, $qty);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Image Gallery</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            font-size: 12px;
        }

        .container {
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
            font-size: 0.7rem;
            padding: 6px 12px;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }

        .modal-body {
            padding: 10px;
        }

        .col-md-4 {
            margin-bottom: 12px;
        }

        .image-card {
            border: 2px solid #007bff;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 12px;
            transition: transform 0.3s ease;
            text-align: center;
        }

        .image-card:hover {
            transform: scale(1.05);
        }

        .image-card img {
            border-radius: 50%;
            margin-bottom: 8px;
            width: 100px;
            height: 70px;
        }

        .magac {
            font-size: 0.9rem;
            font-weight: bold;
            color: #007bff;
        }

        .qiimo {
            font-size: 0.8rem;
            color: #333;
        }

        .qty {
            margin-top: 6px;
            text-align: center;
            padding: 5px;
            width: 60%;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 0.8rem;
        }

        .add {
            background-color: #ffc107;
            border: none;
            color: #333;
            padding: 6px 12px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 0.8rem;
        }

        .add:hover {
            background-color: #e0a800;
        }

        .text-center {
            text-align: center;
        }

        .cart-button {
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
        }

        .cart-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-md-12 text-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">Add New</button>
        </div>

        <div class="row mt-3">
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
                        <img src="<?php echo $row['img'] ?>" alt="" class="rounded-circle">
                        <h4 class="magac"><?php echo $row['name'] ?></h4>
                        <h5 class="qiimo"><?php echo $row['price'] ?></h5>
                        <form method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $row['id'] ?>">
                            <input type="hidden" name="name" value="<?php echo $row['name'] ?>">
                            <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                            <input type="number" name="qty" class="text-center qty" placeholder="Qty" min="1" required>
                            <p><button type="submit" name="add_to_cart" class="btn btn-warning add mt-2">Add to Cart</button></p>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <!-- Cart Button -->
        <div class="text-center">
            <a href="cart.php">
                <button class="cart-button">View Cart</button>
            </a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
