

<?php
if (isset($_POST['submit'])) {
    /** require common.php to sanitize form */
     require "../common.php";
     try {
         /** require DBconnect.php to connect to database for */
         require "../src/DBconnect.php";
             $new_user = array(
                  "Firstname" => $_POST['Firstname'],
             "Lastname" => $_POST['Lastname'],
             "Email" => $_POST['Email'],
             "Password" => $_POST['Password'],
             "ConfirmPassword" => $_POST['ConfirmPassword']
         );
         header("location:./thankyou.php");

        $sql = sprintf("INSERT INTO %s (%s) values (%s)", "users",
         implode(", ", array_keys($new_user)),
         ":" . implode(", :", array_keys($new_user)));
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
 } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
 }
}
?>


<?php if (isset($_POST['submit']) && $statement) { ?>
    <?php echo escape($_POST['Firstname']); ?> successfully registered.
<?php } ?>


<link rel="stylesheet" href="css/mystyle.css" />
        <div class ="registration-form ">
            <h1> Sign Up</h1>
            <h4> Its free and only takes a minute</h4>
            <form method="post">
                <label for="Firstname">First name: </label>
                <input type="text" name="Firstname" id="Firstname" required placeholder="Firstname" >

                <label for="Lastname">Last name: </label>
                <input type="text" name="Lastname" id="Lastname" required placeholder="Lastname" >

                <label for="Email">Email: </label>
                <input type="email" name="Email" id="Email" required placeholder="Email" >

                <label for="Password">Password: </label>
                <input type="password" name="Password" required placeholder="Password" >

                <label for="ConfirmPassword">Confirm Password: </label>
                <input type="password" name="ConfirmPassword" id="ConfirmPassword" required placeholder="Re-enter password" > <br> <br>
                <button type ="submit" name="submit" value="Submit"> Create account </button>
             </form>
        </div>
       <p>Already have an account?  <a href="login.php">Sign in </a> </p> <br><br><br>
        <p><a href="index.php">Back to home</a></p>

<?php include "templates/footer.php"; ?>




