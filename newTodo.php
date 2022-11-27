<?php
if (isset($_POST['todoName'])) {
    $todoname = trim(htmlspecialchars($_POST['todoName']));
    if (file_exists('todo.json')) {
        $json = file_get_contents('todo.json');
        $jsonArray = json_decode($json, true);
    } else {
        $jsonArray = [];
    }
    $jsonArray[$todoname] = ['completed' => true];
    file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
    session_start();
    $_SESSION['AddMessage'] = true;
    header('location: index.php');
}
?>