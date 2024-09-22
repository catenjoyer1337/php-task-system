<?php
require_once '../src/task.php';
require_once '../src/user.php';

$users = getUsers();
$tasks = getTasks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin Page</title>
</head>
<body>
    <h2>Admin Panel</h2>
    
    <div class="admin-section">
        <h3>Users</h3>
        <table>
            <tr><th>Name</th><th>Points</th><th>Admin</th></tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['points']; ?></td>
                    <td><?php echo $user['isAdmin'] ? 'Yes' : 'No'; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="admin-section">
        <h3>Tasks</h3>
        <table>
            <tr><th>Task</th><th>Description</th><th>Value</th><th>Penalty</th></tr>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?php echo $task['taskName']; ?></td>
                    <td><?php echo $task['taskDesc']; ?></td>
                    <td><?php echo $task['value']; ?></td>
                    <td><?php echo $task['penalty']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
