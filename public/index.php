<?php
require_once '../src/task.php';
$tasks = getTasks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>Task System</title>
</head>
<body>
    <div class="calendar">
        <?php foreach (range(1, 30) as $day): ?>
            <div class="day-box">
                <p><?php echo $day; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="task-list">
        <h2>Tasks</h2>
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li style="color: <?php echo getTaskColor($task['value']); ?>">
                    <?php echo $task['taskName'] . " - " . $task['value'] . " Points"; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>

<?php
function getTaskColor($value) {
    if ($value >= 20) return 'red';
    if ($value >= 10) return 'orange';
    return 'green';
}
?>
