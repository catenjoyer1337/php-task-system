<?php
require_once '../src/db.php';
require_once '../src/task.php';

// Handle form submission for adding and deleting tasks
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addTask'])) {
        addTask($_POST['taskName'], $_POST['taskDesc'], $_POST['taskRank'], $_POST['taskFreq']);
    } elseif (isset($_POST['deleteTask'])) {
        deleteTask($_POST['taskId']);
    }
}

// Fetch tasks (sorting and search)
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'date_added';
$order = isset($_GET['order']) ? $_GET['order'] : 'DESC';
$search = isset($_GET['search']) ? $_GET['search'] : '';

$tasks = getTasks($sort, $order, $search);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
<style>
<?php include_once '../css/style.css'?>
    body {
        font-family: Arial, sans-serif;
        background-color: var(--primary);
        color: var(--text-primary);
    }

    h1 {
        color: var(--text-primary);
    }

    .form-container {
        background-color: var(--secondary);
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    input, select {
        padding: 10px;
        margin: 5px;
        border: 1px solid var(--accent);
        border-radius: 4px;
        background-color: var(--primary);
        color: var(--text-primary);
    }

    button {
        background-color: var(--terciary);
        color: var(--primary);
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: var(--accent);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: var(--primary);
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid var(--accent);
    }

    th {
        background-color: var(--secondary);
        color: var(--text-primary);
        cursor: pointer;
    }

    tr:hover {
        background-color: var(--secondary);
    }

    .action-button {
        background-color: var(--terciary);
        color: var(--primary);
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
    }

    .action-button:hover {
        background-color: var(--accent);
    }
</style>

</head>
<body>

<div class="container">
    <h1>Task Management</h1>

    <!-- Task Form -->
    <form action="task-managment.php" method="POST" class="task-form">
        <input type="text" id="taskName" name="taskName" placeholder="Task Name" required>
        <input type="text" id="taskDesc" name="taskDesc" placeholder="Task Description">
        <select id="taskRank" name="taskRank">
            <option value="1">1 - Low</option>
            <option value="2">2 - Medium</option>
            <option value="3">3 - High</option>
            <option value="4">4 - Urgent</option>
        </select>
        <select id="taskFreq" name="taskFreq">
            <option value="1">Daily</option>
            <option value="2">Weekly</option>
            <option value="3">Biweekly</option>
            <option value="4">Monthly</option>
        </select>
        <button type="submit" name="addTask">Add Task</button>
    </form>

    <!-- Search Form -->
    <form action="task-managment.php" method="GET" class="search-form">
        <input type="text" name="search" placeholder="Search tasks..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
    </form>

    <!-- Task Table -->
    <table class="task-table">
        <thead>
            <tr>
                <th><a href="?sort=taskName&order=<?php echo ($sort === 'taskName' && $order === 'ASC') ? 'DESC' : 'ASC'; ?>">Task Name</a></th>
                <th>Description</th>
                <th><a href="?sort=value&order=<?php echo ($sort === 'value' && $order === 'ASC') ? 'DESC' : 'ASC'; ?>">Pts</a></th>
                <th><a href="?sort=date_added&order=<?php echo ($sort === 'date_added' && $order === 'ASC') ? 'DESC' : 'ASC'; ?>">Date</a></th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?php echo htmlspecialchars($task['taskName']); ?></td>
                <td><?php echo htmlspecialchars($task['taskDesc']); ?></td>
                <td><?php echo $task['value']; ?></td>
                <td><?php echo $task['date_added']; ?></td>
                <td>
                    <form action="task-managment.php" method="POST" style="display:inline;">
                        <input type="hidden" name="taskId" value="<?php echo $task['id']; ?>">
                        <button type="submit" name="deleteTask">[-]</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
