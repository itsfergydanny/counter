<?php
require_once './database/SQL.php';
require_once 'config.php';

$config = new Config();
$sql = new SQL($config);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Counter - Counter App</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<header>

</header>

<main class="container">
    <h1>Add a new counter!</h1>
    <form action="index.php" method="post" class="addform">
        <label for="id">ID: </label>
        <input type="text" name="id" id="id" placeholder="no_delivery" pattern=".{3,}" required>
        <p>Minimum 3 characters.</p>
        <br>
        <label for="display">Display Name: </label>
        <input type="text" name="display" id="display" placeholder="DAYS WITHOUT X (you can use emojis here)" pattern=".{1,}" required>
        <p>Minimum 1 characters.</p>
        <br>
        <label for="initial">Initial Value: </label>
        <input type="text" name="initial" id="initial" value="0" pattern=".{1,}" required>
        <p>Minimum 1 characters.</p>
        <br>
        <button>Submit</button>
    </form>
    <div class="back">
        <a href="index.php">Back</a>
    </div>
</main>

<footer>

</footer>
</body>
</html>
