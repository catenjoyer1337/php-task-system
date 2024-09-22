<?php
require_once '../src/task.php';
require_once '../src/user.php';

$taskId = $_POST['taskId'];
$userId = $_POST['userId'];
$taskValue = $_POST['taskValue'];

if (completeTask($taskId)) {
    updateUserPoints($userId, $taskValue);
    echo "Task completed!";
} else {
    echo "Error completing task.";
}
?>
