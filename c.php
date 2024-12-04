<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Your Shopping Cart</h1>

<table id="cart">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr class="cart-item">
            <td>Apple</td>
            <td class="price">10</td>
            <td><input type="number" class="quantity" value="1" min="1"></td>
            <td class="total">10</td>
            <td><button class="remove">Remove</button></td>
        </tr>
        <tr class="cart-item">
            <td>Banana</td>
            <td class="price">5</td>
            <td><input type="number" class="quantity" value="1" min="1"></td>
            <td class="total">5</td>
            <td><button class="remove">Remove</button></td>
        </tr>
    </tbody>
</table>

<h3>Total Price: <span id="totalPrice">15</span></h3>

<script src="script.js"></script>
</body>
</html>
