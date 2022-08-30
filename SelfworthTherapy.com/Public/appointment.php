<?php session_start();
if($_SESSION['Active'] == false){ /* Redirects user to Login.php if not logged in. Remember, we set $_SESSION['Active'] == true in login.php*/
    header("location:./login.php");
    exit;
} ?>




<?php
if (isset($_POST['submit'])) {
    require "../common.php";
    try {
        require "../src/DBconnect.php";

        /* $connection = new PDO($dsn, $username, $password, $options);  */
        $new_user = array(
            "Name" => $_POST['Name'],
            "Email" => $_POST['Email'],
            "Phone" => $_POST['Phone'],
            "Date" => $_POST['Date'],
            "Time" => $_POST['Time'],
            "Message" => $_POST['Message']
        );

        header('Location:./confirmation.php');

        $sql = sprintf("INSERT INTO %s (%s) values (%s)", "appointments",
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
    <?php echo escape($_POST['Name']); ?> successfully created.
<?php } ?>




<link rel="stylesheet" href="css/mystyle.css" />
<link rel="stylesheet" href="css/appoint.css" />



<div class ="appointment-form ">
    <h1> <p> Book an appointment</p></h1>
        <form method="post">
            <label for="Name">Name: </label>
            <input type="text" name="Name" id="Name" required placeholder="Name" >


            <label for="Email">Email: </label>
            <input type="email" name="Email" id="Email" required placeholder="Email" >

            <label for="Phone">Phone: </label>
            <input type="tel" name="Phone" required placeholder="Phone" >

            <label for="date">Date:</label>
            <input type="date" id="Date" name="Date">

            <label for="time">Time:</label>
            <input type="time" id="Time" name="Time">

            <label for="Message">Briefly describe the nature of your problem:</label>
            <textarea id="Message" name="Message" rows="4" cols="50">  </textarea>

            <button type ="submit" name="submit" value="Submit"> Submit </button>
        </form>

    <br><br>
    <p><a href="index.php">Back to home</a></p>
</div>

<?php require "templates/footer.php"; ?>
