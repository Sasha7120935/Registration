<?php
/**
 * Created by Belous Alex.
 * Description: Registration form with full validation
 * Date: 15/2/22
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);
spl_autoload_register();
\Classes\Auth::getWelcome();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php if (\Classes\Auth::getUserLogin() !== null) : ?>
    <p>Registration already completed</p>
<?php else: ?>
    <div class="container">
        <div class="col-lg-offset-2 col-lg-10">
            <form method="post" class="form-horizontal" action="index.php">
                <h2>Registration Form</h2>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="name"><span class="text-danger">*</span> Name:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="surname"><span class="text-danger">*</span>
                        Surname:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" id="surname" placeholder="Enter surname" name="surname"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="email"><span class="text-danger">*</span> Email:</label>
                    <div class="col-lg-4">
                        <?php \Classes\Validate::validateEmail(); ?>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="pwd"><span class="text-danger">*</span> Password:</label>
                    <div class="col-lg-4">
                        <?php \Classes\Validate::validatePassword(); ?>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd"
                               required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                               title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="conPwd"><span class="text-danger">*</span> Confirm
                        Password :</label>
                    <div class="col-lg-4">
                        <input type="password" class="form-control" id="conPwd" placeholder="Enter confirm password"
                               name="conPwd" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                               title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-4">
                        <button type="submit" name="login" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>
</body>
</html>
