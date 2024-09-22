<?php
function connectDb() {
    return new PDO('sqlite:../db/tasksystem.db');
}
?>
