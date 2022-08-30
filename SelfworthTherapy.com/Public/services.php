<?php session_start();
if($_SESSION['Active'] == false){ /* Redirects user to Login.php if not logged in. Remember, we set $_SESSION['Active'] == true in login.php*/
    header("location:./login.php");
    exit;
} ?>


<?php include "templates/header.php"; ?>
<link rel="stylesheet" href="css/about.css">

<br><br>
<h1>Compassion Focused Coaching and Mentoring
</h1>
<div class="container">
    <div class="center">
        <p> <div class="image" style="height: 70% ;"> <img src="css/img/session.jpg" alt="" width="800px%" height="400px" class="logo"></div> </p>

        What will services at the Self-Worth therapy entail?
        We offer an 8 weeks programme where you will be able to discuss and explore a current issue in your life that you are struggling with.
        It may be something that you feel is holding you back from being more content in life, or something that you have dreamed of doing
        but not yet been able to achieve.
        In these 8 weeks you will learn how the human brain operates from an evolutionary perspective and how this influences everyday
        living (emotions, decisions, actions).
        You will also be taught techniques and learn new ways of dealing with problems.
        You will be coached to use a Compassion Focused kitbag to help you find balance in your life.
        <br>
        <br>

        Following completion of the 8 week coaching programme, should you wish to continue to be supported by the Centre,
        you can consider moving to our Mentoring Programme. This would involve a once monthly meeting for 90 minutes to
        review progress and challenges faced in the previous month.
        It gives coaching clients the opportunity to continue to learn and practice CMT techniques  and adapt them to your needs.

    </div>
</div>
<br>
<?php include "templates/footer.php"; ?>
