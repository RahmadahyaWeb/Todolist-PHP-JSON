<?php
if (isset($_GET['todo'])) {
    $todo = $_GET['todo'];
    $json = file_get_contents('todo.json');
    $jsonArray = json_decode($json, true);
    unset($jsonArray[$todo]);

    file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
    session_start();
    $_SESSION['DeleteMessage'] = true;
    header('location: index.php');
}
?>