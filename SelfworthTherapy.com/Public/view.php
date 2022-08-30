<?php
/**
 * Function to query information based on
 * a parameter: in this case, appointments.
 *
 */

if (isset($_POST['submit'])) {
 try {
 require "../common.php";
 require_once '../src/DBconnect.php';
 $sql = "SELECT *
 FROM appointments
 WHERE Name = :Name";
 $Name = $_POST['Name'];
 $statement = $connection->prepare($sql);
 $statement->bindParam(':Name', $Name, PDO::PARAM_STR);
 $statement->execute();
 $result = $statement->fetchAll();
 } catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
 }
}
if (isset($_POST['submit'])) {
 if ($result && $statement->rowCount() > 0) {
?>

 <h2>Results</h2>
 <table>
 <thead>
<tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Time</th>
</tr>
 </thead>
 <tbody>
 <?php foreach ($result as $row) { ?>
    <tr>
        <td><?php echo escape($row["id"]); ?></td>
        <td><?php echo escape($row["Name"]); ?></td>
        <td><?php echo escape($row["Email"]); ?></td>
        <td><?php echo escape($row["Phone"]); ?></td>
        <td><?php echo escape($row["Date"]); ?></td>
        <td><?php echo escape($row["Time"]); ?></td>
    </tr>
 <?php } ?>
 </tbody>
 </table>
 <?php } else { ?>
     <h1> No Appointments scheduled for <?php echo escape($_POST['Name']); ?>. </h1>
 <?php }
} ?>

<link rel="stylesheet" href="./Public/css/table.css" />
<br><br><br>
<h2>Search Appointments</h2>
<form method="post">
 <label for="Name">Name</label>
 <input type="text" id="Name" name="Name">
 <input type="submit" name="submit" value="View Results">
</form>









