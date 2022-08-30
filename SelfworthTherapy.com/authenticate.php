<?php
session_start();

if (isset($_POST['submit'])) {
    try {
        require "common.php";
        require "src/DBconnect.php";
        $sql = "SELECT * FROM users WHERE Email = :Email AND password = :password";
        $Email = $_POST['Email'];
        $password = $_POST['password'];
        $statement = $connection->prepare($sql);
        $statement->bindParam(':Email', $Email, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
if (isset($_POST['submit'])) {
    if ($result && $statement->rowCount() > 0) {
            $_SESSION['Email'] = $Email;
            $_SESSION['password'] = $password;
            $_SESSION['Active'] = true;
            header("location:./index.php");

        ?>

    <?php } else { ?>
        <h1> <span class="error">* Incorrect details!</span> <br> <br> Please enter a correct Email and Password or <a href="register.php">Create an account </a> to continue! </h1> <br> <br>
    <?php }
} ?>
