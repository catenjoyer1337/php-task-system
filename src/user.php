<?php
require_once 'db.php';

function addUser($name, $isAdmin = 0) {
    $db = connectDb();
    $stmt = $db->prepare('INSERT INTO users (name, isAdmin) VALUES (?, ?)');
    return $stmt->execute([$name, $isAdmin]);
}

function getUsers() {
    $db = connectDb();
    $stmt = $db->query('SELECT * FROM users');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function updateUserPoints($userId, $points) {
    $db = connectDb();
    $stmt = $db->prepare('UPDATE users SET points = points + ? WHERE id = ?');
    return $stmt->execute([$points, $userId]);
}
?>
