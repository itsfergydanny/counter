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
    <form action="index.php" method="post">
        <label for="id">ID: </label>
        <input type="text" name="id" id="id" placeholder="days without doing something bad">
        <br>
        <label for="display">Display Name: </label>
        <input type="text" name="display" id="display" placeholder="DAYS WITHOUT X (you can use emojis here)">
        <br>
        <label for="initial">Initial Value: </label>
        <input type="text" name="initial" id="initial" value="0">
        <br>
        <button>Submit</button>
    </form>
</main>

<footer>

</footer>
</body>
</html>
