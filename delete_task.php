<?php
require 'task_details.php';
session_start();
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_task'])) {
        $task_name = $_POST['task_name'];
        $updateStatus = $conn->prepare("DELETE FROM tasks_details  WHERE user_id = ? AND task_name = ?");
        $updateStatus->execute([$user_id, $task_name]);
    }
header("Location: View_my_tasks.php");
}
?>
