<?php include "templates/header.php"; ?>

<?php session_start();
if($_SESSION['Active'] == false){ /* Redirects user to Login.php if not logged in. Remember, we set $_SESSION['Active'] == true in login.php*/
    header("location:./login.php");
    exit;
} ?>



    <link rel="stylesheet" href="css/contact.css"/>
<br><br>


    <div class ="content">
        <h3>Call us: +3530833437140 <br>
            Email us: selfworththerapy@.gmail.com </h3> <br> <br>

        <h2> See where we are located:   </h2>
        <p> Blanchardstown Rd N, <br> Blanchardstown, <br>Dublin.<br> D15 YV78.</p>
    </div>

<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br><br>
<br><br><br><br><br>
<br><br>
<?php include "templates/footer.php"; ?>
