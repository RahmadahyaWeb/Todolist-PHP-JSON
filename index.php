<?php
//Rahmadahya 
session_start();

$todos = [];
if (file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todos = json_decode($json, true);
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Notes App</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">



</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container my-5 ">
            <form action="newTodo.php" method="post">
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 mb-3">
                        <h1 class="display-3 text-center text-primary fw-semibold">TODOLIST</h1>
                    </div>
                    <div class="col-12">

                        <?php
                        if (isset($_SESSION['AddMessage'])) {
                            echo '
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Successfully add todo!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>';
                            unset($_SESSION['AddMessage']);
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['DeleteMessage'])) {
                            echo '
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Successfully Delete todo!
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        </button>
                                    </div>';
                            unset($_SESSION['DeleteMessage']);
                        }
                        ?>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="todoName" class="form-label">Todo Name</label>
                        <input type="text" class="form-control" Required placeholder="Type todo" name="todoName">
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 mb-3">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Add todo</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($todos as $todo => $status): ?>
                    <div class="col-12 col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $todo; ?>
                                </h5>
                                <a href="deleteTodo.php?todo=<?= $todo; ?>" class="card-link text-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </form>

        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>