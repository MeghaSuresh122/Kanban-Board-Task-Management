<?php
    session_start();
    require 'db.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="draganddrop.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <title>Kanban Board Task Management</title>
  </head>
  <body>

    <div class="container mt-5">

    <?php include('msg.php'); ?>

      <div class="row">
        <div class="col-md-12 bg-info">
          <b id="head">Kanban Board Task Management
            <a href="task-add.php" class="btn btn-primary float-end mt-2">Add Task</a>
          </b>
        </div>
      </div>

      <div class="row bg-light mt-3">
        <div class="col-md-4 mt-3 mb-3">
          <div class="card h-100">
            <div class="card-header">
              <b id="head2">To Do</b>
            </div>
            <div class="card-body" id="Do" ondragover="allowDrop(event)" ondrop="drop(event)">

              <?php
                $query="SELECT * FROM cards WHERE category='Do'";
                $run_query=mysqli_query($con,$query);
                if(mysqli_num_rows($run_query)>0)
                {
                  foreach($run_query as $card)
                  {
                    ?>
                      <div class="hover">
                        <div class="card mt-2" id="<?= $card['id'] ?>" draggable="true" ondragstart="drag(event)">
                          <div class="card-header" id="<?= $card['id'] ?> " >
                            <?= $card['title'] ?>
                            <div class="float-end mt-0">
                              <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                  <a href="task-edit.php?id=<?= $card['id'] ?>" class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                </li>
                                <li class="list-inline-item">
                                  <form action="action_page.php" method="POST" class="d-inline">
                                    <button name="delete_task" value="<?= $card['id'] ?>" class="btn btn-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Delete">
                                      <i class="fa fa-trash"></i>
                                    </button>
                                  </form>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="card-body" id="<?= $card['id'] ?>">
                            <?= nl2br($card['description']) ?>
                          </div>
                        </div>
                      </div>
                    <?php
                  }
                }
              ?>

            </div>
          </div>
        </div>
        <div class="col-md-4 mt-3 mb-3">
        <div class="card h-100">
            <div class="card-header">
              <b id="head2">Doing</b>
            </div>
            <div class="card-body" id="Doing" ondragover="allowDrop(event)" ondrop="drop(event)">

              <?php
                $query="SELECT * FROM cards WHERE category='Doing'";
                $run_query=mysqli_query($con,$query);
                if(mysqli_num_rows($run_query)>0)
                {
                  foreach($run_query as $card)
                  {
                    ?>
                      <div class="hover">
                        <div class="card mt-2" id="<?= $card['id'] ?>" draggable="true" ondragstart="drag(event)">
                          <div class="card-header" id="<?= $card['id'] ?>">
                            <?= $card['title'] ?>
                            <div class="float-end mt-0">
                              <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                  <a href="task-edit.php?id=<?= $card['id'] ?>" class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                </li>
                                <li class="list-inline-item">
                                  <form action="action_page.php" method="POST" class="d-inline">
                                    <button name="delete_task" value="<?= $card['id'] ?>" class="btn btn-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Delete">
                                      <i class="fa fa-trash"></i>
                                    </button>
                                  </form>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="card-body" id="<?= $card['id'] ?>">
                            <?= nl2br($card['description']) ?>
                          </div>
                        </div>
                      </div>
                    <?php
                  }
                }
              ?>

            </div>
          </div>
        </div>
        <div class="col-md-4 mt-3 mb-3">
        <div class="card h-100">
            <div class="card-header">
              <b id="head2">Done</b>
            </div>
            <div class="card-body" id="Done" ondragover="allowDrop(event)" ondrop="drop(event)">

              <?php
                $query="SELECT * FROM cards WHERE category='Done'";
                $run_query=mysqli_query($con,$query);
                if(mysqli_num_rows($run_query)>0)
                {
                  foreach($run_query as $card)
                  {
                    ?>
                      <div class="hover">
                        <div class="card mt-2" id="<?= $card['id'] ?>" draggable="true" ondragstart="drag(event)">
                          <div class="card-header" id="<?= $card['id'] ?>">
                            <?= $card['title'] ?>
                            <div class="float-end mt-0">
                              <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                  <a href="task-edit.php?id=<?= $card['id'] ?>" class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                </li>
                                <li class="list-inline-item">
                                  <form action="action_page.php" method="POST" class="d-inline">
                                    <button name="delete_task" value="<?= $card['id'] ?>" class="btn btn-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Delete">
                                      <i class="fa fa-trash"></i>
                                    </button>
                                  </form>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="card-body" id="<?= $card['id'] ?>">
                            <?= nl2br($card['description']) ?>
                          </div>
                        </div>
                      </div>
                    <?php
                  }
                }
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>