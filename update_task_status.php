<?php
require 'task_details.php';
session_start();
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['complete_task'])) {
        $task_name = $_POST['task_name'];
        date_default_timezone_set('Asia/Kolkata');
        $currentDate = date('Y-m-d');
        $currentTime = date('H:i:s');
        $updateStatus = $conn->prepare("UPDATE tasks_details SET status='yes',date=?, time=? WHERE user_id = ? AND task_name = ?");
        $updateStatus->execute([$currentDate, $currentTime,$user_id, $task_name]);
    }
    header("Location: View_my_tasks.php");
}
?>