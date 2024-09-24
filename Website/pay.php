<?php
session_start();
include_once('../sources/linkFIle.php'); // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get payment information from the form
    $username = $_SESSION['username'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];

    // Validate the input
    if (empty($amount) || $amount <= 0) {
        $error = "Invalid amount.";
    } else {
        // Here, you would integrate with a payment gateway API (e.g., Stripe, PayPal)
        // For demonstration, we'll just simulate a successful payment

        // Simulate payment processing (replace this with actual payment gateway logic)
        $payment_success = true; // Simulate a successful payment

        if ($payment_success) {
            // Store payment information in your database
            $sqlInsert = "INSERT INTO payments (username, amount, payment_method, payment_status, payment_time) 
                          VALUES (?, ?, ?, 'Completed', NOW())";
            $stmt = $connect->prepare($sqlInsert);
            $stmt->bind_param("sis", $username, $amount, $payment_method);

            if ($stmt->execute()) {
                $success_message = "Payment successful! Thank you for your purchase.";
            } else {
                $error = "Error processing payment. Please try again.";
            }
        } else {
            $error = "Payment failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Payment</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Payment</h2>

        <?php if (isset($success_message)): ?>
            <div class="alert alert-success"><?= $success_message ?></div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="post" action="">
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" required>
            </div>
            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method</label>
                <select class="form-select" id="payment_method" name="payment_method" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <!-- Add more payment options as needed -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Pay Now</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>