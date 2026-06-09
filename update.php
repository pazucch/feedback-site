<?php

include 'config/database.php';

$id = filter_input(
    INPUT_POST,
    'id',
    FILTER_VALIDATE_INT
);

$body = filter_input(
    INPUT_POST,
    'body',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
);

$stmt = mysqli_prepare(
    $conn,
    "UPDATE feedback
     SET body = ?
     WHERE id = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "si",
    $body,
    $id
);

if(mysqli_stmt_execute($stmt)) {
    header('Location: feedback.php');
    exit;
}