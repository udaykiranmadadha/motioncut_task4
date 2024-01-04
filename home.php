<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];
    $user_id = $_POST['user_id'];
    $date= $_POST['date'];
    $time= $_POST['time'];

    // Create connection
    $db = mysqli_connect('localhost', 'root', '', 'todolist');

    // Insert task details into task_details table
    $insertQuery = "INSERT INTO tasks_details (user_id, task_name,date,time,status) VALUES ('$user_id', '$task_name','$date','$time','no')";
    $result = mysqli_query($db, $insertQuery);

    
} else {
    
}

?>


<!DOCTYPE html>
<html lang="en-us">

<head>
  <meta charset="UTF-8">
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link href="styles_home.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    
  </style>
</head>

<body style="background-image: url(homeback.jpg);background-attachment: fixed;background-size: cover;">

  <!-- Navigation Bar -->
  <div style="margin-bottom:200px">
    <ul class="fixed-top" style="">

      <li class="li">
        <a href="Login.html">Logout</a>
      </li>
      <li class="li">
        <a href="#">About</a>
      </li>
      <li class="li">
        <a href="View_my_tasks.php" id="taskManager">Task Manage</a>
      </li>
      <li class="li">
        <a href="#">Home</a>
      </li>
    </ul>
  </div>

  <!-- Task Form -->
  <div style="display: flex;justify-content: center;align-items: center;flex-direction: column;">
    <div class="d-flex flex-column justify-content-center inner_div">
      <a href="View_my_tasks.php"><h4>View my tasks</h4></a>
    </div>
    <div>
    <form id="taskForm"  action="home.php" method="post">
      <div class="d-flex flex-column justify-content-center inner_div1">
        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name"  required>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date"  required>
        <label for="time">Time:</label>
        <input type="time" id="time" name="time"  required>
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <button class="inner_div" type="submit" style="width:370px;">Add Task</button>
      </div>
    </form>
    </div>
  </div>
  <footer>
    &copy; 2023 Uday Kiran Software Solutions. All rights reserved.
  </footer>
</body>

</html>
