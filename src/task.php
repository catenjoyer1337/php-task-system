<?php
require_once 'db.php';

function addTask($taskName, $taskDesc, $taskRank, $taskFreq) {
    $db = connectDb();
    $value = 5 * $taskRank;
    $penalty = 4 * $taskRank;
    $stmt = $db->prepare('INSERT INTO tasks (taskName, taskDesc, taskRank, taskFreq, value, penalty) VALUES (?, ?, ?, ?, ?, ?)');
    return $stmt->execute([$taskName, $taskDesc, $taskRank, $taskFreq, $value, $penalty]);
}

function getTasks() {
    $db = connectDb();
    $stmt = $db->query('SELECT * FROM tasks');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function completeTask($taskId) {
    $db = connectDb();
    $date = date('Y-m-d');
    $stmt = $db->prepare('UPDATE tasks SET last_completed = ? WHERE id = ?');
    return $stmt->execute([$date, $taskId]);
}
?>
