<?php
class Database {
    private $conn;

    public function __construct() {
        $servername = "mysql-emuworld.alwaysdata.net";
        $username = "emuworld";
        $password = "Azxsdcvf!123";
        $dbname = "emuworld_mysql";

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function getGames($console, $letter) {
        $table_name = preg_replace('/[^a-zA-Z0-9]/', '', $console);

        if ($letter === '#') {
            $sql = "SELECT title, cover_url, download_url FROM `$table_name` WHERE title REGEXP '^[^a-zA-Z]' ORDER BY title";
            $stmt = $this->conn->prepare($sql);
        } else {
            $sql = "SELECT title, cover_url, download_url FROM `$table_name` WHERE title LIKE ? ORDER BY title";
            $stmt = $this->conn->prepare($sql);
            $like_param = $letter . '%';
            $stmt->bind_param('s', $like_param);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $games = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $games;
    }

    public function close() {
        $this->conn->close();
    }
}
?>