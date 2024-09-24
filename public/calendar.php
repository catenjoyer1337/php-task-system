
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Calendar</title>
    <style>
        /* Color Variables */
        :root {
            --text-primary: #252323;
            --accent: #70798C;
            --primary: #F5F1ED;
            --secondary: #DAD2BC;
            --terciary: #A99985;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: var(--primary);
            color: var(--text-primary);
            display: flex;
            height: 100dvh; 
        }

        .calendar-container {
            flex-grow: 3;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .calendar-header {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .calendar-header button {
            background-color: var(--accent);
            color: var(--primary);
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 1em;
        }

        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            height: 100%;
        }

        .calendar-day {
            background-color: var(--secondary);
            padding: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .calendar-day:hover {
            background-color: var(--terciary);
            cursor: pointer;
        }

        .calendar-day h3 {
            font-size: 1.2em;
            margin: 0;
            color: var(--text-primary);
        }

        .sidebar {
            flex-grow: 1;
            background-color: var(--secondary);
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            gap: 10px;
        }

        .sidebar .task {
            background-color: var(--accent);
            padding: 15px;
            border-radius: 5px;
            color: var(--primary);
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .sidebar .task:hover {
            transform: translateY(-3px);
        }

        .sidebar .stats {
            background-color: var(--terciary);
            padding: 15px;
            border-radius: 5px;
            color: var(--primary);
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="calendar-container">
        <div class="calendar-header">
            <button>&lt; Prev</button>
            <span>September 2024</span>
            <button>Next &gt;</button>
        </div>

        <div class="calendar">
            <?php
                for ($i = 1; $i <= 30; $i++) {
                    echo '<div class="calendar-day">';
                    echo '<h3>Day ' . $i . '</h3>';
                    // Placeholder for task data
                    echo '<span>No tasks</span>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>

    <div class="sidebar">
        <div class="stats">
            <h4>Stats</h4>
            <p>Total Points: 120</p>
            <p>Completed Tasks: 15</p>
        </div>

        <div class="task">
            <h4>Task 1</h4>
            <p>Description of task 1.</p>
        </div>

        <div class="task">
            <h4>Task 2</h4>
            <p>Description of task 2.</p>
        </div>

        <div class="task">
            <h4>Task 3</h4>
            <p>Description of task 3.</p>
        </div>

        <div class="task">
            <h4>Task 4</h4>
            <p>Description of task 4.</p>
        </div>
    </div>
</body>
</html>
