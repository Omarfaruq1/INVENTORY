<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'inventory1');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the most recent total_id
$total_id_result = $conn->query("SELECT MAX(total_id) AS id FROM shopping_item");
$total_id = ($total_id_result->num_rows > 0) ? $total_id_result->fetch_assoc()['id'] : die("No data found.");

// Fetch item and total details
$query = "
    SELECT si.item_name, si.qty, si.price, (si.qty * si.price) AS item_total, totals.total 
    FROM shopping_item si
    INNER JOIN totals ON si.total_id = totals.total_id
    WHERE si.total_id = '$total_id'
";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: #f4f7f9;
            color: #333;
        }
        .invoice {
            max-width: 700px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 1.8rem;
            color: #3498db;
            font-weight: 700; /* Bold font weight for the title */
        }
        .header p {
            margin: 5px 0;
            color: #7f8c8d;
            font-size: 0.9rem;
            font-weight: 700; /* Bold font weight for the date */
        }
        .header .date,
        .header .time {
            color: #3498db; /* Blue color for the date and time */
            font-weight: 700; /* Increased font weight */
            font-size: 1.1rem;
        }
        .header .time {
            margin-top: 5px; /* Add some space between date and time */
        }
        .details {
            margin-bottom: 20px;
        }
        .details h4 {
            margin: 0;
            font-size: 1rem;
            color: #333;
            font-weight: 700; /* Bold font weight for company info header */
        }
        .details p {
            margin: 5px 0;
            font-size: 0.9rem;
            color: #7f8c8d;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }
        table th {
            background: #3498db;
            color: #fff;
            text-transform: uppercase;
            font-size: 0.9rem;
            font-weight: 700; /* Bold font weight for table headers */
        }
        table tr:nth-child(odd) {
            background: #f9fafa;
        }
        .total {
            text-align: right;
            font-weight: 700; /* Bold font weight for total amounts */
            color: #2c3e50;
        }
        .highlight {
            color: #e74c3c;
            font-weight: 700; /* Bold font weight for highlight (Grand total/VAT) */
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #7f8c8d;
        }
        .print-btn {
            display: inline-block;
            padding: 10px 20px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
        }
        .print-btn:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <!-- Header -->
        <div class="header">
            <h1>Invoice</h1>
            <p>Thank you for shopping with us!</p>
             <!-- Time below the date -->
        </div>

        <!-- Details -->
        <div class="details" >
            <h4>Qoobey Restaurant</h4>
            <p></p>
            <p>123 Main Street, City, Country</p>
            <p>Email: info@example.com</p>
            <p>Phone: (123) 456-7890</p>
        </div>

        <!-- Table -->
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php 
                    $subtotal = 0;
                    $qty = 0;
                    while ($row = $result->fetch_assoc()):
                        $subtotal += $row['item_total'];
                        $qty += $row['qty'];
                    ?>
                        <tr>
                            <td><?php echo $row['item_name']; ?></td>
                            <td><?php echo $row['qty']; ?></td>
                            <td><?php echo number_format($row['price'], 2); ?></td>
                            <td><?php echo number_format($row['item_total'], 2); ?></td>
                        </tr>
                    <?php endwhile; ?>
                    <?php 
                    $vat = $qty * 0.05; // VAT 5%
                    $grand_total = $subtotal + $vat;
                    ?>
                    <tr>
                        <td colspan="3" class="total">Subtotal</td>
                        <td><?php echo number_format($subtotal, 2); ?></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="total">VAT (5%)</td>
                        <td class="highlight"><?php echo number_format($vat, 2); ?></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="total">Grand Total</td>
                        <td class="highlight"><?php echo number_format($grand_total, 2); ?></td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align:center;">No items found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Footer -->
        <div class="footer">
            <p>We hope to see you again soon!</p>
            <!-- Date -->

            <p class="time"><strong>Date:</strong> <?php echo date("d-m-Y"); ?><strong style="margin-left:5%">Time:</strong> <?php echo date("H:i:s"); ?></p>
            <button class="print-btn" onclick="window.print();">Print Invoice</button>
        </div>
    </div>
</body>
</html>
