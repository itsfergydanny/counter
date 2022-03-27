<?php

class SQL {
    private $pdo = null;

    public function __construct($config) {

        $dsn = "mysql:host=$config->host;dbname=$config->db;charset=UTF8";

        try {
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $this->pdo = new PDO($dsn, $config->user, $config->password, $options);
            $this->createTable();
        } catch (Exception $e) {
//            echo $e->getMessage();
        }
    }

    private function createTable() {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS counters ( id VARCHAR(100) NOT NULL , display VARCHAR(128) NOT NULL, count INT NOT NULL , UNIQUE (id)) ENGINE = InnoDB;");
    }

    public function prepare($statement) {
        return $this->pdo->prepare($statement);
    }

    public function getCount($id) {
        $stmt = $this->prepare("SELECT * FROM counters WHERE id = ?");

        $stmt->execute([$id]);

        while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
            return $row['count'] . PHP_EOL;
        }

        return 0;
    }

    public function getDisplay($id) {
        $stmt = $this->prepare("SELECT * FROM counters WHERE id = ?");

        $stmt->execute([$id]);

        while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
            return $row['display'] . PHP_EOL;
        }

        return "";
    }

    public function getAll() {
        $stmt = $this->prepare("SELECT * FROM counters");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function increment($id) {
        $this->prepare("UPDATE counters SET count=count+1 WHERE id = ?")->execute([$id]);
    }

    public function reset($id) {
        $this->prepare("UPDATE counters SET count=0 WHERE id = ?")->execute([$id]);
    }

    public function add($id, $display, $initial) {
        $this->prepare("INSERT INTO counters(id, display, count) VALUES (?,?,?)")->execute([$id, $display, $initial]);
    }

    public function delete($id) {
        $this->prepare("DELETE FROM counters WHERE id = ?")->execute([$id]);
    }
}
