<?php
/**
 * Delete an appointment
 */
$success = "";
if (isset($_GET["id"])) {
    try {
        require "../common.php";
        require_once '../src/DBconnect.php';
        $id = $_GET["id"];
        $sql = "DELETE FROM appointments WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $success = "Appointment successfully deleted";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
try {
    require_once '../src/DBconnect.php';
    $sql = "SELECT * FROM appointments";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>


    <h2>Delete appointments</h2>
<?php if ($success) echo $success; ?>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Time</th>
            <th>Delete</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row) : ?>
            <tr>
                <td><?php echo escape($row["id"]); ?></td>
                <td><?php echo escape($row["Name"]); ?></td>
                <td><?php echo escape($row["Email"]); ?></td>
                <td><?php echo escape($row["Phone"]); ?></td>
                <td><?php echo escape($row["Date"]); ?></td>
                <td><?php echo escape($row["Time"]); ?></td>
                <td><a href="delete.php?id=<?php echo escape($row["id"]);
                    ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php
