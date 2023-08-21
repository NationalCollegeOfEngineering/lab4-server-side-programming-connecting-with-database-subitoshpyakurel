<?php
session_start();
include('helper/database.php');
if (isset($_SESSION['is_login']) || $_SESSION['is_login'] != 'yes') {
    if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin123') {
        $_SESSION['is_login'] = 'yes';
    } else {
        $_SESSION["is_login"] = '';
        session_destroy();
        header("Location: /NCE-PROJECT/index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        table,
        tr,
        td {
            border: solid black 1px;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php require('layout/header.php'); ?><br>
    Welcome to homepage. The Users are:
    <br><br>
    <table>
        <tr>
            <td>S.No.</td>
            <td>Name</td>
            <td>Address</td>
        </tr>
        <?php
        $pdo = connectdatabase();
        $select_query = "SELECT user_id,username,address FROM users";
        $stmt = $pdo->query($select_query);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            ?>
            <tr>
                <td>
                    <?php echo $row['user_id']; ?>
                </td>
                <td>
                    <?php echo $row['username']; ?>
                </td>
                <td>
                    <?php echo $row['address']; ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table><br>
    <footer>
        <a href="/NCE-PROJECT/logout.php">Click here to Logout</a><br><br>
        <?php include_once('layout/footer.php'); ?>
    </footer>
</body>

</html>