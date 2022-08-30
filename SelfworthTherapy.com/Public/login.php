<?php
/**
 * login authentication
 * authenticate email and password.
 *
 */

 ?>

<?php
// define variables and set to empty values
$passErr = $emailErr = "";
$password = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["password"])) {
        $passErr = "*Please enter your password";
    } else {
        $password = test_input($_POST["password"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-0-9+&@#\/%=~_' ]*$/",$password)) {
            $passErrErr = "*Only letters and numerics allowed";
        }
    }

    if (empty($_POST["Email"])) {
        $emailErr = " *Please enter your email";
    } else {
        $email = test_input($_POST["Email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "*Invalid email format";
        }
    }
}

/**
 * sanitising functions
 *
 */
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<link rel="stylesheet" href="css/mystyle.css" />

<div class ="login-form ">
    <h1>LOGIN</h1>
    <form method="post" action="">
        <label for="Email"> Email: </label>
        <input type="text" name="Email" required placeholder="email">  <?php echo $emailErr;?>  <br><br>
        <label for="Name"> Password: </label>
        <input type="password" name="password" required placeholder="enter password" > <?php echo $passErr;?>
        <br><br>
         <button type="submit" name="submit" value="Submit"> Login</button>

    </form>
</div>
<p>Not a member yet? <a href="register.php"> Register now</a></p> <br><br><br>
<p><a href="index.php">Back to home</a></p>
<?php require "../authenticate.php"; ?>

<br><br><br><br><br><br>
<?php include "templates/footer.php"; ?>