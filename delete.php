<?php

include 'config/database.php';

if(isset($_POST['id'])) {

    $id = $_POST['id'];

    $stmt = mysqli_prepare(
        $conn,
        "DELETE FROM feedback WHERE id = ?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "i",
        $id
    );

    if(mysqli_stmt_execute($stmt)) {
        header('Location: feedback.php');
        exit;
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}