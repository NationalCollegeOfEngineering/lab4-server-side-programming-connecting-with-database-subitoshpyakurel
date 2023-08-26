<?php
require_once "helper/database.php";
$pdo = connectDatabase();

if (isset($_POST['signup']) && isset($_POST['un'])) {
    $insert_query = "INSERT INTO users(username,password,address) VALUES(:un, :pw, :addr)";
    $stmt = $pdo->prepare($insert_query);
    $stmt->execute(
        array(
            ':un' => $_POST['un'],
            ':pw' => $_POST['pw'],
            ':addr' => $_POST['address']
        )
    );
    echo 'Sign Up Succesful <a href="/nce-project">Login</a>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include_once('layout/header.php'); ?>
    <form action="" method="post">
        Username: <input type="text" name="un" id="">
        <br>
        Password: <input type="text" name="pw" id="">
        <br>
        Address: <input type="text" name="address" id="">
        <br>
        <input type="submit" value="Signup" name="signup">
    </form>
    <?php include_once('layout/footer.php'); ?>
</body>

</html>