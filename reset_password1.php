<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pharmacy Management System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-4">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Pharmacy Management System</h4>
                                    
                                    <h1>Reset Password</h1>
                                            <?php if (isset($_GET['email'])) : ?>
                                                <label>A CODE HAS BEEN SENT TO <b><?php echo $_GET['email']; ?></b> ENTER BELOW CODE 👇</label>
                                            <?php endif; ?>
                                            <?php if (isset($_GET['error'])) : ?>
                                                <div style="color: red;"><?php echo $_GET['error']; ?></div>
                                            <?php endif; ?>
                                            <form method="post" action="update_password.php">
                                                <div class="form-group">
                                                    <label for="reset_code"><strong>Reset Code:</strong></label> <br>
                                                    <input type="text" id="reset_code" class="form-control" name="reset_code" required>
                                                    <br><br>
                                                </div>
                                                <label for="new_password"><strong>New Password:</strong>:</label>
                                                <input type="password" id="new_password" class="form-control" name="new_password" required>
                                                <br><br>
                                                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                                            </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

</body>

</html>