<?php
    require_once './database/SQL.php';
    require_once 'config.php';

    $config = new Config();
    $sql = new SQL($config);

    if (isset($_POST['id']) && isset($_POST['display']) && isset($_POST['initial'])) {
        try {
            $sql->add($_POST['id'], $_POST['display'], $_POST['initial']);
            header("Location: index.php");
        } catch (Exception $e) {
            // todo output error in creating new counter
        }
    }

    $counters = $sql->getAll();

    if (isset($_POST['increase']) && isset($_POST['id'])) {
        $id = $_POST['id'];
        foreach ($counters as &$counter) {
            if ($counter['id'] == $id) {
                $sql->increment($id);
                header("Location: index.php");
            }
        }
    }

    if (isset($_POST['reset']) && isset($_POST['id'])) {
        $id = $_POST['id'];
        foreach ($counters as &$counter) {
            if ($counter['id'] == $id) {
                $sql->reset($id);
                header("Location: index.php");
            }
        }
    }

    if (isset($_POST['delete']) && isset($_POST['id'])) {
        $id = $_POST['id'];
        foreach ($counters as &$counter) {
            if ($counter['id'] == $id) {
                $sql->delete($id);
                header("Location: index.php");
            }
        }
    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Counter App</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <header>

    </header>

    <main class="container">
        <h1>Counter App</h1>
        <?php foreach($counters as $counter): ?>
            <div class="counter">
                <h2 class="title"><?=  $counter['display']  ?></h2>
                <span class="count"><?=  $counter['count']  ?></span>
                <form action="" method="post">
                    <input type="submit" name="increase" value="Add 1" />
                    <input type="submit" name="reset" value="Reset" />
                    <input type="submit" name="delete" value="Delete" />
                    <input type="hidden" name="id" value="<?= $counter['id'] ?>">
                </form>
                <p>Last updated: <?= $counter['last_updated'] ?></p>
            </div>
        <?php endforeach; ?>
        <div class="add">
            <a href="add.php">Add Counter</a>
        </div>
    </main>

    <footer>

    </footer>
</body>
</html>
