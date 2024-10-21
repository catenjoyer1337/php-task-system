<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: var(--primary, #F5F1ED);
            color: var(--text-primary, #252323);
        }
        .container {
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }
        ul {
            list-style-type: none;
        }
        li {
            padding: 10px 0;
        }
        a {
            text-decoration: none;
            color: var(--accent, #70798C);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Available Pages</h1>
        <ul>
            <?php
            // Scan the current directory for .php files and display them
            $files = scandir('.');
            foreach ($files as $file) {
                if (strpos($file, '.php') !== false && $file != 'index.php') {
                    echo "<li><a href='$file'>" . ucfirst(str_replace('.php', '', $file)) . "</a></li>";
                }
            }
            ?>
        </ul>
    </div>
</body>
</html>
