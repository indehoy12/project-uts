<?php
class User {
    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

public function login($username, $password)
{
    $query = "SELECT * FROM " . $this->table . " WHERE username = ? AND password = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();
}


    public function register($username, $password)
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
     $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    return $stmt->execute();
}

}
?>
