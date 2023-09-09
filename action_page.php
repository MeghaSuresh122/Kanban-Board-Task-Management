<?php
    session_start();
    require 'db.php';

    if(isset($_POST['add_task']))
    {
        $title=mysqli_real_escape_string($con,$_POST['title']);
        $description=mysqli_real_escape_string($con,$_POST['description']);
        $category=mysqli_real_escape_string($con,$_POST['category']);
    
        if(is_null($title))
        {
            $_SESSION['message']="Enter a title, data not added";
            header("Location: task-add.php");
            exit(0);
        }
        if(is_null($description))
        {
            $_SESSION['message']="Enter a description, data not added";
            header("Location: task-add.php");
            exit(0);
        }
    
        $query="INSERT INTO cards (title,description,category) VALUES ('$title','$description','$category')";
        $run_query=mysqli_query($con,$query);
        if($run_query)
        {
            $_SESSION['message']="Task added successfully";
            header("Location: task-add.php");
            exit(0);
        }
        else
        {
            $_SESSION['message']="Task not added";
            header("Location: task-add.php");
            exit(0);
        }
    }
    
    
    if(isset($_POST['update_task']))
    {
        $task_id=mysqli_real_escape_string($con,$_POST['id']);
        $title=mysqli_real_escape_string($con,$_POST['title']);
        $description=mysqli_real_escape_string($con,$_POST['description']);

        if(is_null($title))
        {
            $_SESSION['message']="Enter a title";
            header("Location: task-edit.php");
            exit(0);
        }
        if(is_null($description))
        {
            $_SESSION['message']="Enter a description";
            header("Location: task-edit.php");
            exit(0);
        }

        $query="UPDATE cards SET title='$title',description='$description' WHERE id='$task_id'";
        $run_query=mysqli_query($con,$query);
        if($run_query)
        {
            $_SESSION['message']="Task updated successfully";
            header("Location: index.php");
            exit(0);
        }
        else
        {
            $_SESSION['message']="Task not updated";
            header("Location: index.php");
            exit(0);
        }
    }

    if(isset($_POST['delete_task']))
    {
        $task_id=mysqli_real_escape_string($con,$_POST['delete_task']);

        $query="DELETE FROM cards WHERE id='$task_id'";
        $run_query=mysqli_query($con,$query);
        if($run_query)
        {
            $_SESSION['message']="Task deleted successfully";
            header("Location: index.php");
            exit(0);
        }
        else
        {
            $_SESSION['message']="Task not deleted";
            header("Location: index.php");
            exit(0);
        }
    }

?>