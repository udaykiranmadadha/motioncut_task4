<?php
require 'task_details.php';
session_start();
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
    <link rel="stylesheet" href="View_my_tasks.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
</head>


<body style="background-image: url(homeback.jpg);background-attachment: fixed;background-size: cover;">

    <!-- Navigation Bar -->
    <div style="margin-bottom:200px">
        <ul class="fixed-top" style="list-style-type: none;background-color: black; padding-top: 20px;padding-bottom: 20px;">
        <!-- Your navigation items -->
        <li class="li">
        <a href="Login.html">Logout</a>
        </li>
        <li class="li">
        <a href="#" >About</a>
        </li>
        <li class="li" >
        <a href="View_my_tasks.php">Task Manage</a>
        </li>
        <li class="li">
        <a href="home.php">Home</a>
        </li>
        </ul>
    </div>

    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

        <!--incomplete tasks-->

        <?php 
          $tasks = $conn->prepare("SELECT task_name,date,time FROM tasks_details WHERE user_id = ? AND status='no' ");
          $tasks->execute([$user_id]);
        ?>
        <div style="float:left;margin-left:50px;" >
        <div class="show-todo-section " >
            <h3 style="text-align:center;">Yet to do</h3>
            <?php if($tasks->rowCount() <= 0){ ?>
                <!--code for when no tasks are found -->
            <?php } ?>

            <?php while($task = $tasks->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="todo-item d-flex flex-column justify-content-center ">

                    <form action="update_task_status.php" method="POST">
                        <input type="hidden" name="task_name" value="<?php echo $task['task_name']; ?>">
                        <ul style="list-style-type: none;">
                            <li >
                            <h4 style="float:left;width:50%;"><?php echo $task['task_name'] ?></h4></li>
                            <p style="float:left;width:50%;"> on: <?php echo $task['date'] . ' ' . $task['time']; ?></p>
                            <br>
                            <li><button type="submit" name="complete_task" style="width:45%; border-radius:5px;float:left;margin-right:10px;"   onclick="return confirm('Are you sure you want to mark this task as finished?')"><h6>Complete</h6></button> 
                            </li>
                    </form>  
                    <form action="delete_task.php" method="POST">
                        <input type="hidden" name="task_name" value="<?php echo $task['task_name']; ?>">
                        <ul style="list-style-type: none;">
                            <li >
                            <button type="submit" name="delete_task" style="width:45%;border-radius:5px;float:left; " onclick="return confirm('Are you sure you want to mark this task as finished and delete?')"><h6>delete</h6></button> 
                            </li>
                        </ul>
                    </form>
                </div>  
        <?php } ?>
        </div>
        </div>


       <!--compleyted tasks-->


        <?php 
          $tasks = $conn->prepare("SELECT task_name,date, time FROM tasks_details WHERE user_id = ? AND status='yes' ");
          $tasks->execute([$user_id]);
        ?>
      <div style="float:right;margin-right:50px;">
      <div class="show-todo-section " >
            <h3 style="text-align:center;">Finished</h3>
            <?php if($tasks->rowCount() <= 0){ ?>
                <!-- code for when no tasks are found -->
            <?php } ?>

            <?php while($task = $tasks->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item d-flex flex-column justify-content-center ">
                <form action="update_task_statusno.php" method="POST">
                    <input type="hidden" name="task_name" value="<?php echo $task['task_name']; ?>">
                    <ul style="list-style-type: none;">
                        <li >
                        <h4 style="float:left;width:50%;"><?php echo $task['task_name'] ?></h4>
                        <p style="float:left;width:50%;">Finished on: <?php echo $task['date'] . ' ' . $task['time']; ?></p>
                        
                        </li>
                        <br>
                        <li>
                        <button type="submit" name="incomplete_task" style="width:45%; border-radius:5px;float:left;margin-right:10px;"   onclick="return confirm('Are you sure you want to mark this task as unfinished?')"><h6>unfinished</h6></button> 
                        </li>
                    
                </form>
                
                <form action="delete_task.php" method="POST">
                    <input type="hidden" name="task_name" value="<?php echo $task['task_name']; ?>">
                    
                        <li >
                        <button type="submit" name="delete_task" style="width:45%;border-radius:5px;float:left; " onclick="return confirm('Are you sure you want to mark this task as finished and delete?')"><h6>delete</h6></button> 
                        </li>
                    </ul>
                </form>
                </div>


        <?php } ?>
      </div>
      </div>
    </div>
    <footer style="background-color: black; color: white; padding: 20px; text-align: center; position: fixed; bottom: 0; width: 100%;">&copy; 2023 Uday Kiran Software Solutions. All rights reserved.</footer>
</body>
</html>