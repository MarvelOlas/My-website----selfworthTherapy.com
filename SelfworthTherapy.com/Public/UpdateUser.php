<?php
/**
 * Use an HTML form to edit an entry in the
 * users table.
 *
 */
require "../common.php";
if (isset($_POST['submit'])) {
    try {
        require_once '../src/DBconnect.php';
 $user =[
     "id" => $_POST['id'],
     "Firstname" => $_POST['Firstname'],
     "Lastname" => $_POST['Lastname'],
     "Email" => $_POST['Email'],
     "password" => $_POST['password'],
     "ConfirmPassword" => $_POST['ConfirmPassword']
 ];
 $sql = "UPDATE users
 SET id = :id,
 Firstname = :Firstname,
 Lastname = :Lastname,
 Email = :Email,
 password = :password,
 ConfirmPassword = :ConfirmPassword
 WHERE id = :id";
 $statement = $connection->prepare($sql);
 $statement->execute($user);
 } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_GET['id'])) {
    try {
        require_once '../src/DBconnect.php';
 $id = $_GET['id'];
 $sql = "SELECT * FROM users WHERE id = :id";
 $statement = $connection->prepare($sql);
 $statement->bindValue(':id', $id);
 $statement->execute();
 $user = $statement->fetch(PDO::FETCH_ASSOC);
 } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
} else {
    echo "Something went wrong!";
    exit;
}
?>


<?php if (isset($_POST['submit']) && $statement) : ?>
    <?php echo escape($_POST['Firstname']); ?> successfully updated.
<?php endif; ?>
<h2>Edit a user</h2>
<form method="post">
    <?php foreach ($user as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key;
        ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ?
            'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>
