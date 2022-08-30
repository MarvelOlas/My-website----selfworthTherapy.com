<?php
/**
 * Delete an appointment
 */
require "../common.php";
$success = "";
if (isset($_GET["id"])) {
    try {
        require_once '../src/DBconnect.php';
        $id = $_GET["id"];
        $sql = "DELETE FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $success = "User successfully deleted";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
try {
    require_once '../src/DBconnect.php';
    $sql = "SELECT * FROM users";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>


    <h2>Delete Users</h2>
<?php if ($success) echo $success; ?>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>password</th>
            <th>ConfirmPassword</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row) : ?>
            <tr>
                <td><?php echo escape($row["id"]); ?></td>
                <td><?php echo escape($row["Firstname"]); ?></td>
                <td><?php echo escape($row["Lastname"]); ?></td>
                <td><?php echo escape($row["Email"]); ?></td>
                <td><?php echo escape($row["password"]); ?></td>
                <td><?php echo escape($row["ConfirmPassword"]); ?></td>
                <td><a href="deleteUsers.php?id=<?php echo escape($row["id"]);
                    ?>">Delete Users</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php
