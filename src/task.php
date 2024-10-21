<?php
require_once 'db.php';

// Fetch tasks, optionally sorted and searched
function getTasks($sort = 'date_added', $order = 'DESC', $search = '') {
    $db = connectDb();
    $query = "SELECT * FROM tasks WHERE taskName LIKE :search ORDER BY $sort $order";
    $stmt = $db->prepare($query);
    $stmt->execute(['search' => "%$search%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Add a new task
function addTask($taskName, $taskDesc, $taskRank, $taskFreq) {
    $db = connectDb();
    $value = 5 * $taskRank; // Task value calculation
    $penalty = 4 * $taskRank; // Task penalty calculation
    $query = "INSERT INTO tasks (taskName, taskDesc, taskRank, taskFreq, value, penalty, date_added) 
              VALUES (:taskName, :taskDesc, :taskRank, :taskFreq, :value, :penalty, datetime('now'))";
    $stmt = $db->prepare($query);
    $stmt->execute([
        'taskName' => $taskName,
        'taskDesc' => $taskDesc,
        'taskRank' => $taskRank,
        'taskFreq' => $taskFreq,
        'value' => $value,
        'penalty' => $penalty
    ]);
}

// Delete a task
function deleteTask($taskId) {
    $db = connectDb();
    $query = "DELETE FROM tasks WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->execute(['id' => $taskId]);
}
