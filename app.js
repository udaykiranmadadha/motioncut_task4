document.addEventListener('DOMContentLoaded', function () {
    const taskForm = document.getElementById('taskForm');
    const taskList = document.getElementById('taskList');
  
    taskForm.addEventListener('submit', function (event) {
      event.preventDefault();
  
      const taskInput = document.getElementById('task');
      const taskText = taskInput.value.trim();
  
      if (taskText !== '') {
        addTask(taskText);
        taskInput.value = '';
      }
    });
  
    function addTask(taskText) {
      const taskItem = document.createElement('div');
      taskItem.classList.add('task');
  
      const taskOptions = document.createElement('div');
      taskOptions.classList.add('task-options');
  
      const editButton = document.createElement('button');
      editButton.textContent = 'Edit';
      editButton.addEventListener('click', function () {
        editTask(taskItem);
      });
  
      const deleteButton = document.createElement('button');
      deleteButton.textContent = 'Delete';
      deleteButton.addEventListener('click', function () {
        deleteTask(taskItem);
      });
  
      taskOptions.appendChild(editButton);
      taskOptions.appendChild(deleteButton);
  
      taskItem.textContent = taskText;
      taskItem.appendChild(taskOptions);
  
      taskList.appendChild(taskItem);
    }
  
    function editTask(taskItem) {
      const newTaskText = prompt('Edit task:', taskItem.textContent);
      if (newTaskText !== null) {
        taskItem.textContent = newTaskText;
      }
    }
  
    function deleteTask(taskItem) {
      if (confirm('Are you sure you want to delete this task?')) {
        taskItem.remove();
      }
    }
  
    // Logout Function
    window.logout = function () {
      // Add your logout logic here
      alert('Logout clicked');
    };
  });
  