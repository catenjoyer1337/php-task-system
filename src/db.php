<?php
function connectDb() {
    $db = new PDO('sqlite:../db/tasksystem.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            points INTEGER DEFAULT 0,
            isAdmin INTEGER DEFAULT 0
        );
        
        CREATE TABLE IF NOT EXISTS tasks (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            taskName TEXT NOT NULL,
            taskDesc TEXT,
            taskRank INTEGER NOT NULL,
            taskFreq INTEGER NOT NULL,
            value INTEGER,
            penalty INTEGER,
            last_completed TEXT
        );
    ");
    
    return $db;
}
?>
